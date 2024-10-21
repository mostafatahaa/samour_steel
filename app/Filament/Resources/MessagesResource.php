<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MessagesResource\Pages;
use App\Filament\Resources\MessagesResource\RelationManagers;
use App\Models\ContactUs;
use App\Models\Messages;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MessagesResource extends Resource
{
    protected static ?string $model = ContactUs::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('is_read', NULL)->count();
    }

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('pages.name'))
                    ->columnSpanFull(),
                TextInput::make('email')
                    ->label(__('pages.email'))
                    ->columnSpanFull(),
                TextInput::make('phone')
                    ->label(__('pages.phone'))
                    ->columnSpanFull(),

                Textarea::make('description')
                    ->label(__('pages.message'))
                    ->columnSpanFull(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable()->label(__('pages.name')),
                TextColumn::make('phone')->label(__('pages.phone'))->searchable(),
                TextColumn::make('email')->label(__('pages.email'))->searchable(),
                TextColumn::make('description')->label(__('pages.message'))->limit(50),
                TextColumn::make('created_at')->sortable()->date()->label(__('pages.created_at')),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageMessages::route('/'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }


    public static function getNavigationGroup(): ?string
    {
        return __('pages.messages');
    }

    public static function getTitleCasePluralModelLabel(): string
    {
        return __('pages.messages');
    }

    public static function getLabel(): string
    {
        return __('pages.message');
    }

    public static function getPluralLabel(): ?string
    {
        return __('pages.messages2');
    }
}
