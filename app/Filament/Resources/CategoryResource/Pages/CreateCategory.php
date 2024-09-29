<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;

    public function getTitle(): string | Htmlable
    {
        if (filled(static::$title)) {
            return static::$title;
        }

        return __('pages.create_category');
    }
}
