<?php

namespace App\Providers;

use Filament\Support\Facades\FilamentColor;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
//        FilamentColor::register([
//            'primary' => Color::Amber,
//        ]);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        if(!$this->app->environment('local')) {
            URL::forceScheme('https');
        }
    }
}
