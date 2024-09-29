<?php

namespace App\Filament\Widgets;

use App\Models\ContactUs;
use App\Models\Product;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DataWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(__('pages.admins'), User::count())
                ->description(__(__('pages.admins_description')))
                ->descriptionIcon('heroicon-m-users')
                ->color('primary'),

            Stat::make(__('pages.products'), Product::count())
                ->description(__(__('pages.products_description')))
                ->descriptionIcon('heroicon-o-cube')
                ->color('primary'),

            Stat::make(__('pages.messages'), ContactUs::count())
                ->description(__(__('pages.messages_description')))
                ->descriptionIcon('heroicon-o-envelope')
                ->color('primary'),
        ];
    }
}
