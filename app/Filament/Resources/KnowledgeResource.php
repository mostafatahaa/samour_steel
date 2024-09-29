<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KnowledgeResource\Pages;
use App\Filament\Resources\KnowledgeResource\RelationManagers;
use App\Models\Knowledge;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
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
use Illuminate\Support\Str;

class KnowledgeResource extends Resource
{
    protected static ?string $model = Knowledge::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('ar_title')
                    ->required()
                    ->minLength(2)
                    ->maxLength(255)
                    ->label(__('pages.ar_title')),



                TextInput::make('en_title')
                    ->minLength(2)
                    ->required()
                    ->maxLength(255)
                    ->label(__('pages.en_title')),

                FileUpload::make('image')
                    ->downloadable()
                    ->required()
                    ->directory('knowledge/images')
                    ->visibility('public')
                    ->disk('public')
                    ->columnSpan(2)
                    ->label(__('pages.main_image'))
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/svg+xml', 'image/tiff']),

                RichEditor::make('description')
                    ->label(__('pages.description'))
                    ->columnSpan(2)
                    ->placeholder(__('pages.enter_description')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label(__('pages.image')),
                TextColumn::make('ar_title')->sortable()->searchable()->label(__('pages.title'))->limit(50),
                TextColumn::make('views')->label(__('pages.views'))->default(0)->sortable(),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKnowledge::route('/'),
            'create' => Pages\CreateKnowledge::route('/create'),
            'edit' => Pages\EditKnowledge::route('/{record}/edit'),
        ];
    }

    public static function getTitleCasePluralModelLabel(): string
    {
        return __('pages.knowledge');
    }
    public static function getNavigationGroup(): ?string
    {
        return __('pages.pages');
    }

    public static function getLabel(): string
    {
        return __('pages.knowledge');
    }

    public static function getPluralLabel(): ?string
    {
        return __('pages.knowledge2');
    }
}
