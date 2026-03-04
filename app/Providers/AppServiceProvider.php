<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        // Render uses HTTPS at its reverse proxy layer.
        // Force HTTPS so that all generated URLs (assets, links, forms) use https://
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}