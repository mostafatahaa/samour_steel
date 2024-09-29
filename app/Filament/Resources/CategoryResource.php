<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder-open';



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
                    ->required()
                    ->minLength(2)
                    ->maxLength(255)
                    ->label(__('pages.en_name')),

                FileUpload::make('image')->directory('categories/images')->visibility('public')->disk('public')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/svg+xml', 'image/tiff'])
                    ->columnSpanFull(),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label(__('pages.image')),
                TextColumn::make('ar_name')->sortable()->searchable()->label(__('pages.name')),
                TextColumn::make('created_at')->sortable()->date()->label(__('pages.created_at')),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->action(function (Category $category) {
                        if ($category->products()->exists()) {
                            return Notification::make()
                                ->title(__('pages.category_has_products', ['name' => $category->name]))
                                ->warning()
                                ->send();
                        }
                        return  Notification::make()
                            ->title(__('pages.category_deleted_successfully'))
                            ->success()
                            ->send();
                    })
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->before(function ($records, Tables\Actions\DeleteBulkAction $action) {
                            foreach ($records as $category) {
                                if ($category->products()->count() > 0) {
                                    Notification::make()
                                        ->title(__('pages.category_has_products', ['name' => $category->name]))
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return __('pages.shop');
    }
    public static function getTitleCasePluralModelLabel(): string
    {
        return __('pages.categories');
    }

    public static function getLabel(): string
    {
        return __('pages.category');
    }

    public static function getPluralLabel(): ?string
    {
        return __('pages.categories2');
    }
}
