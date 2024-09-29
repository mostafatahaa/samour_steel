<?php

namespace App\Providers;

use App\Models\AboutUs;
use App\Models\Settings;
use Illuminate\Support\ServiceProvider;
//use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
//        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
//            $switch
//                ->locales(['ar', 'en']);
//        });
        Paginator::useBootstrapFour();

        View::composer('*', function ($view) {
            $aboutUs = AboutUs::with('images')->first();
            $settings = Settings::first();
            $view->with('aboutUs', $aboutUs);
            $view->with('settings', $settings);
        });

        require_once app_path('Helper/helper.php');
    }
}
