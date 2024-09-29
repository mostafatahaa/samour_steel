<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
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
use Illuminate\Support\Str;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('pages.main_info'))->schema([
                    TextInput::make('ar_title')
                        ->required()
                        ->minLength(2)
                        ->maxLength(255)
                        ->columnSpanFull()
                        ->label(__('pages.ar_title')),



                    TextInput::make('en_title')
                        ->minLength(2)
                        ->columnSpanFull()
                        ->required()
                        ->maxLength(255)
                        ->label(__('pages.en_title')),

                    FileUpload::make('image')
                        ->downloadable()
                        ->required()
                        ->directory('news/images')
                        ->visibility('public')
                        ->disk('public')
                        ->columnSpan(2)
                        ->label(__('pages.main_image'))
                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/svg+xml', 'image/tiff']),

                    RichEditor::make('description')
                        ->label(__('pages.main_description'))
                        ->columnSpan(2)
                        ->placeholder(__('pages.enter_description')),

                ]),
                Section::make(__('pages.additional_info'))->schema([


                    Forms\Components\Repeater::make('descriptions')
                        ->relationship('descriptions')
                        ->schema([
                            TextInput::make('ar_title')
                                ->minLength(2)
                                ->columnSpanFull()
                                ->label(__('pages.ar_title'))
                                ->maxLength(255),

                            TextInput::make('en_title')
                                ->minLength(2)
                                ->columnSpanFull()
                                ->label(__('pages.en_title'))
                                ->maxLength(255),

                            RichEditor::make('description')
                                ->label(__('pages.description'))
                                ->columnSpan(2)
                                ->placeholder(__('pages.enter_description')),
                            Forms\Components\Repeater::make('images')
                                ->relationship('images')
                                ->schema([
                                    Forms\Components\FileUpload::make('image')
                                        ->directory('news/images')
                                        ->downloadable()
                                        ->visibility('public')
                                        ->disk('public')
                                        ->label(__('pages.image'))
                                        ->deletable()
                                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/svg+xml', 'image/tiff']),
                                ])
                                ->addActionLabel(__('pages.add_more')) // Label for the repeater
                                ->label(__('pages.additional_info'))
                                ->columnSpan(2)
                                ->defaultItems(1)
                                ->collapsible(),
                        ])
                        ->label(__('pages.additional_news_info'))
                        ->columnSpan(2)
                        ->addActionLabel(__('pages.add_more')) // Label for the repeater
                        ->defaultItems(1)
                        ->collapsible(),
                ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label(__('pages.image')),
                TextColumn::make('title')->sortable()->searchable()->label(__('pages.title'))->limit(50),
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }


    public static function getTitleCasePluralModelLabel(): string
    {
        return __('pages.news');
    }
    public static function getNavigationGroup(): ?string
    {
        return __('pages.pages');
    }

    public static function getLabel(): string
    {
        return __('pages.news');
    }

    public static function getPluralLabel(): ?string
    {
        return __('pages.news2');
    }
}
