<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingsResource\Pages;
use App\Filament\Resources\SettingsResource\RelationManagers;
use App\Models\Settings;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingsResource extends Resource
{
    protected static ?string $model = Settings::class;

    protected static ?string $navigationIcon = 'heroicon-o-adjustments-horizontal';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('phone_number')
                    ->minLength(2)
                    ->label(__('pages.phone_number'))
                    ->suffixIcon('heroicon-m-phone'),

                TextInput::make('whatsapp')
                    ->minLength(2)
                    ->label(__('pages.whatsapp')),

                TextInput::make('campany_name')
                    ->minLength(2)
                    ->label(__('pages.company_name'))
                    ->columnSpanFull(),


                TextInput::make('email')
                    ->minLength(2)
                    ->email()
                    ->maxLength(100)
                    ->label(__('pages.email')),

                TextInput::make('address')
                    ->minLength(2)
                    ->maxLength(1000)
                    ->label(__('pages.address')),

                Section::make(__('pages.meta_tags'))->schema([
                    TagsInput::make('meta_keywords')
                        ->label(__('pages.meta_keys'))
                        ->columnSpanFull(),

                    TextInput::make('meta_author')
                        ->maxLength(255)
                        ->label(__('pages.meta_author'))
                        ->columnSpanFull(),

                    Textarea::make('meta_description')
                        ->maxLength(1000)
                        ->label(__('pages.meta_description'))
                        ->columnSpanFull(),

                ]),

                TextInput::make('facebook')
                    ->minLength(2)
                    ->url()
                    ->suffixIcon('heroicon-m-globe-alt')
                    ->label(__('pages.facebook')),

                TextInput::make('twitter')
                    ->minLength(2)
                    ->url()
                    ->suffixIcon('heroicon-m-globe-alt')
                    ->label(__('pages.twitter')),

                TextInput::make('tiktok')
                    ->minLength(2)
                    ->url()
                    ->suffixIcon('heroicon-m-globe-alt')
                    ->label(__('pages.tiktok')),

                TextInput::make('linkedin')
                    ->minLength(2)
                    ->url()
                    ->suffixIcon('heroicon-m-globe-alt')
                    ->label(__('pages.linkedin')),

                TextInput::make('instegram')
                    ->minLength(2)
                    ->url()
                    ->suffixIcon('heroicon-m-globe-alt')
                    ->label(__('pages.instegram')),

                TextInput::make('years_of_exp')
                    ->numeric()
                    ->label(__('pages.years_of_exp')),

                TextInput::make('num_of_clients')
                    ->numeric()
                    ->label(__('pages.num_of_clients')),

                TextInput::make('num_of_projects')
                    ->numeric()
                    ->label(__('pages.num_of_projects')),

                TextInput::make('num_of_machines')
                    ->numeric()
                    ->label(__('pages.num_of_machines')),

                FileUpload::make('youtube')
                    ->downloadable()
                    ->required()
                    ->directory('settings/logo')
                    ->visibility('public')
                    ->disk('public')
                    ->columnSpanFull()
                    ->label(__('pages.youtube_video')),


                RichEditor::make('inquireies_description')
                    ->label(__('pages.inquireies_description'))
                    ->columnSpan(2)
                    ->placeholder(__('pages.enter_description')),

                FileUpload::make('logo')
                    ->downloadable()
                    ->required()
                    ->directory('settings/logo')
                    ->visibility('public')
                    ->disk('public')
                    ->columnSpanFull()
                    ->label(__('pages.logo'))
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/svg+xml', 'image/tiff']),

                FileUpload::make('footer_logo')
                    ->downloadable()
                    ->required()
                    ->directory('settings/logo')
                    ->visibility('public')
                    ->disk('public')
                    ->columnSpanFull()
                    ->label(__('pages.footer_logo'))
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/svg+xml', 'image/tiff']),

                FileUpload::make('home_banner')
                    ->downloadable()
                    ->required()
                    ->directory('settings/home_banner')
                    ->visibility('public')
                    ->disk('public')
                    ->columnSpanFull()
                    ->label(__('pages.home_banner'))
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/svg+xml', 'image/tiff']),
            ]);
    }

    public static function canCreate(): bool
    {
        return false;
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo')->label(__('pages.logo')),
                TextColumn::make('phone_number')->label(__('pages.phone')),
                TextColumn::make('email')->label(__('pages.email')),
                TextColumn::make('whatsapp')->label(__('pages.whatsapp')),


            ])->paginated(false)
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),

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
            'index' => Pages\ManageSettings::route('/'),
        ];
    }


    public static function getNavigationGroup(): ?string
    {
        return __('pages.settings');
    }

    public static function getTitleCasePluralModelLabel(): string
    {
        return __('pages.general_settings');
    }

    public static function getPluralLabel(): ?string
    {
        return __('pages.general_settings');
    }
}
