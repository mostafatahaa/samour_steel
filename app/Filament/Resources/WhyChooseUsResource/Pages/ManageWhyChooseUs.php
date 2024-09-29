<?php

namespace App\Filament\Resources\WhyChooseUsResource\Pages;

use App\Filament\Resources\WhyChooseUsResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageWhyChooseUs extends ManageRecords
{
    protected static string $resource = WhyChooseUsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
