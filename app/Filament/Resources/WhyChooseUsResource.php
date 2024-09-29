<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WhyChooseUsResource\Pages;
use App\Filament\Resources\WhyChooseUsResource\RelationManagers;
use App\Models\WhyChooseUs;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
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

class WhyChooseUsResource extends Resource
{
    protected static ?string $model = WhyChooseUs::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Repeater::make('data')
                    ->relationship('descriptions')
                    ->label('')
                    ->schema([
                        TextInput::make('ar_title')
                            ->required()
                            ->minLength(2)
                            ->maxLength(255)
                            ->columnSpanFull()
                            ->label(__('pages.ar_title')),

                        TextInput::make('en_title')
                            ->minLength(2)
                            ->required()
                            ->columnSpanFull()
                            ->maxLength(255)
                            ->label(__('pages.en_title')),

                        RichEditor::make('description')

                            ->label(__('pages.description'))
                            ->required()
                            ->placeholder(__('pages.enter_description')),
                    ])
                    ->collapsible() // Optional: Makes the repeater collapsible
                    ->columnSpanFull()
                    ->addActionLabel(__('pages.add_more')) // Label for the repeater


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->paginated(false)

            ->columns([
                TextColumn::make('descriptions.ar_title')->label(__('pages.title'))->limit(50),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageWhyChooseUs::route('/'),
        ];
    }

    public static function getTitleCasePluralModelLabel(): string
    {
        return __('pages.why_choose_us');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('pages.pages');
    }

    public static function getLabel(): string
    {
        return __('pages.description');
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getPluralLabel(): ?string
    {
        return __('pages.why_choose_us');
    }
}
