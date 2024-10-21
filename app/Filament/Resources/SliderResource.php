<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderResource\Pages;
use App\Filament\Resources\SliderResource\RelationManagers;
use App\Models\Settings;
use App\Models\Slider;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
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

class SliderResource extends Resource
{
    protected static ?string $model = Slider::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->minLength(2)
                    ->maxLength(255)
                    ->label(__('pages.title')),

                RichEditor::make('description')
                    ->label(__('pages.description'))
                    ->columnSpan(2)
                    ->placeholder(__('pages.enter_description')),

                FileUpload::make('images')
                    ->downloadable()
                    ->required()
                    ->directory('slider')
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
                ImageColumn::make('images')->label(__('pages.image'))->size(70, 70),
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
            'index' => Pages\ManageSliders::route('/'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return __('pages.sections');
    }

    public static function getTitleCasePluralModelLabel(): string
    {
        return __('pages.slider');
    }

    public static function getPluralLabel(): ?string
    {
        return __('pages.slider');
    }

    public static function getModelLabel(): string
    {
        return __('pages.slider');
    }
}
