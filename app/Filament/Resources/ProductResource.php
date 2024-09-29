<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Category;
use App\Models\Product;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('ar_name')
                    ->required()
                    ->minLength(2)
                    ->maxLength(255)
                    ->label(__('pages.ar_name')),


                TextInput::make('en_name')
                    ->minLength(2)
                    ->required()
                    ->maxLength(255)
                    ->label(__('pages.en_name')),

                Select::make('category_id')
                    ->required()
                    ->label(__('pages.category'))
                    ->relationship('category', 'ar_name'),

                Select::make('status')
                    ->label(__('pages.status'))
                    ->options([
                        'active' => __('pages.active'),
                        'inactive' => __('pages.inactive'),
                    ])->default('active')
                    ->required(),

                FileUpload::make('image')
                    ->downloadable()
                    ->required()
                    ->directory('products/images')
                    ->visibility('public')
                    ->disk('public')
                    ->columnSpanFull()
                    ->label(__('pages.main_image'))
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/svg+xml', 'image/tiff']),


                RichEditor::make('top_description_text')
                    ->label(__('pages.description'))
                    ->columnSpan(2)
                    ->placeholder(__('pages.enter_description')),

                Toggle::make('is_special')
                    ->onColor('success')
                    ->offColor('danger')
                    ->label(__('pages.added_to_home_page'))
                    ->default(0)->columnSpanFull(),

                Forms\Components\Repeater::make('description')
                    ->relationship('descriptions') // Define the relationship method
                    ->schema([

                        TextInput::make('title')
                            ->minLength(2)
                            ->maxLength(255)
                            ->label(__('pages.title')),

                        RichEditor::make('description')
                            ->label(__('pages.description'))
                            ->columnSpan(2)
                            ->placeholder(__('pages.enter_description')),

                        Forms\Components\FileUpload::make('image')
                            ->directory('products/images')
                            ->downloadable()
                            ->visibility('public')
                            ->disk('public')
                            ->label(__('pages.image'))
                            ->deletable()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/svg+xml', 'image/tiff']),
                    ])
                    ->addActionLabel(__('pages.add_more')) // Label for the repeater
                    ->label(__('pages.additional_data'))
                    ->columnSpan(2)
                    ->defaultItems(1)
                    ->collapsible(),

                Forms\Components\Repeater::make('images')
                    ->relationship('images') // Define the relationship method
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->directory('products/images')
                            ->downloadable()
                            ->visibility('public')
                            ->disk('public')
                            ->label(__('pages.image'))
                            ->deletable()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/svg+xml', 'image/tiff']),
                    ])
                    ->addActionLabel(__('pages.add_more')) // Label for the repeater
                    ->label(__('pages.additional_images'))
                    ->columnSpan(2)
                    ->defaultItems(1)
                    ->collapsible(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label(__('pages.image')),
                TextColumn::make('ar_name')->sortable()->searchable()->label(__('pages.name'))->limit(20),
                TextColumn::make('category.ar_name')->sortable()->searchable()->toggleable()->label(__('pages.category')),
                SelectColumn::make('status')->sortable()->label(__('status'))
                    ->options([
                        'active' => __('pages.active'),
                        'inactive' => __('pages.inactive'),
                    ])
                    ->rules(['required']),
                IconColumn::make('is_special')
                    ->boolean()
                    ->label(__('pages.add_to_home_page')),
                TextColumn::make('created_at')->sortable()->date()->label(__('pages.created_at')),

            ])
            ->filters([
                Filter::make(__('pages.active_products'))->query(
                    function ($query) {
                        return $query->where('status', 'active');
                    }
                ),
                Filter::make(__('pages.inactive_products'))->query(
                    function ($query) {
                        return $query->where('status', 'inactive');
                    }
                )
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return __('pages.shop');
    }

    public static function getLabel(): string
    {
        return __('pages.product');
    }

    public static function getTitleCasePluralModelLabel(): string
    {
        return __('pages.products');
    }

    public static function getModelLabel(): string
    {
        return __('pages.product');
    }

    public static function getPluralLabel(): ?string
    {
        return __('pages.products2');
    }
}
