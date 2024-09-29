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
        return static::getModel()::where('is_read',  NULL)->count();
    }

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                TextInput::make('company_name')
                    ->label(__('pages.company_name'))
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

                Repeater::make('products')
                    ->relationship('products') // Assuming 'products' is a relation on the model you're editing
                    ->columnSpanFull()

                    ->schema([
                        // Assuming 'products' relation returns a collection of Product models
                        Select::make('product_id')
                            ->label(__('pages.ask_about'))
                            ->relationship('products', 'ar_name') // 'category' is the relationship on the Product model
                            ->columnSpanFull(),


                    ])
                    ->label(__('pages.product'))
                    ->collapsed(false)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('company_name')->sortable()->searchable()->label(__('pages.company_name')),
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
