<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Actions\Imports\Exceptions\RowImportFailedException;
use Filament\Notifications\Notification;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->minLength(2)->maxLength(255)->label(__('pages.name')),
                TextInput::make('password')->rules('required', 'password', 'min:8')->password()->label(__('pages.password')),
                TextInput::make('email')->rules('required', 'email', 'unique:users,email')
                    ->label(__('pages.email')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->label(__('pages.name')),
                TextColumn::make('email')->searchable()->label(__('pages.email')),
                TextColumn::make('created_at')->searchable()->label(__('pages.created_at'))->date(),

            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make()
                        ->action(function (User $user) {
                            $firstUser = User::orderBy('created_at')->first();
                            if ($user->id === $firstUser->id) {
                                return Notification::make()
                                    ->title(__('pages.user_cant_be_deleted', ['name' => $user->name]))
                                    ->warning()
                                    ->send();
                            }
                            return  Notification::make()
                                ->title(__('pages.user_deleted_successfully'))
                                ->success()
                                ->send();
                        })
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->before(function ($records, Tables\Actions\DeleteBulkAction $action) {
                            foreach ($records as $user) {
                                $firstUser = User::orderBy('created_at')->first();
                                if ($user->id === $firstUser->id) {
                                    Notification::make()
                                        ->title(__('pages.user_cant_be_deleted', ['name' => $user->name]))
                                        ->warning()
                                        ->send();
                                    $action->cancel();
                                }
                            }
                        })
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
    public static function getTitleCasePluralModelLabel(): string
    {
        return __('pages.admins');
    }

    public static function getLabel(): string
    {
        return __('pages.admins');
    }

    public static function getPluralLabel(): ?string
    {
        return __('pages.admins2');
    }
}
