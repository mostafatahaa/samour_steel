<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutUsResource\Pages;
use App\Filament\Resources\AboutUsResource\RelationManagers;
use App\Models\AboutUs;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AboutUsResource extends Resource
{
    protected static ?string $model = AboutUs::class;
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

                RichEditor::make('description')
                    ->label(__('pages.description'))
                    ->columnSpan(2)
                    ->required()
                    ->placeholder(__('pages.enter_description')),

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
                    ->label(__('pages.image'))
                    ->columnSpan(2)
                    ->defaultItems(1)
                    ->collapsible(),

            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->paginated(false)
            ->columns([
                TextColumn::make('ar_title')->label(__('pages.title')),
            ])
            ->paginated(false)
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
                ])->hidden(),
            ]);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageAboutUs::route('/'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return __('pages.pages');
    }

    public static function getTitleCasePluralModelLabel(): string
    {
        return __('pages.about_us');
    }

    public static function getLabel(): string
    {
        return __('pages.about_us');
    }
}
