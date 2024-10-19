<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;

//use App\Filament\Resources\GalleryResource\RelationManagers;
use App\Models\Gallery;
use App\Models\Settings;
use App\Models\Slider;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')
                    ->downloadable()
                    ->required()
                    ->directory('gallery')
                    ->visibility('public')
                    ->disk('public')
                    ->columnSpanFull()
                    ->label(__('pages.image'))
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/svg+xml', 'image/tiff']),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label(__('pages.image'))->size(70, 70),
                TextColumn::make('created_at')->sortable()->date()->label(__('pages.created_at')),


            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ManageGallery::route('/'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return __('pages.pages');
    }

    public static function getTitleCasePluralModelLabel(): string
    {
        return __('pages.gallery');
    }

    public static function getPluralLabel(): ?string
    {
        return __('pages.gallery');
    }

    public static function getModelLabel(): string
    {
        return __('pages.image');
    }
}
