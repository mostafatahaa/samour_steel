<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeaturesResource\Pages;
use App\Filament\Resources\FeaturesResource\RelationManagers;
use App\Models\Features;
use Filament\Actions\DeleteAction;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FeaturesResource extends Resource
{
    protected static ?string $model = Features::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('ar_title')
                    ->required()
                    ->minLength(2)
                    ->maxLength(255)
                    ->label(__('pages.ar_title')),

                RichEditor::make('description')
                    ->label(__('pages.description'))
                    ->columnSpan(2)
                    ->placeholder(__('pages.enter_description')),

                Forms\Components\FileUpload::make('image')
                    ->directory('icons/images')
                    ->downloadable()
                    ->visibility('public')
                    ->disk('public')
                    ->columnSpanFull()
                    ->required()
                    ->label(__('pages.image'))
                    ->deletable()
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/svg+xml', 'image/tiff']),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ar_title')->label(__('pages.title')),
                ImageColumn::make('image')->label(__('pages.image'))
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->hidden(),
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
            'index' => Pages\ListFeatures::route('/'),
            'create' => Pages\CreateFeatures::route('/create'),
            'edit' => Pages\EditFeatures::route('/{record}/edit'),
        ];
    }


    public static function getNavigationGroup(): ?string
    {
        return __('pages.sections');
    }

    public static function getTitleCasePluralModelLabel(): string
    {
        return __('pages.features');
    }

    public static function getLabel(): string
    {
        return __('pages.features');
    }

    public static function getPluralLabel(): ?string
    {
        return __('pages.features');
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
