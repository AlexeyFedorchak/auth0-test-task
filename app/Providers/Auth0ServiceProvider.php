<?php

namespace App\Providers;

use Auth0\SDK\Auth0;
use Illuminate\Support\ServiceProvider;

class Auth0ServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(Auth0::class, function () {
            return new Auth0([
                'domain' => env('AUTH0_DOMAIN'),
                'clientId' => env('AUTH0_CLIENT_ID'),
                'clientSecret' => env('AUTH0_CLIENT_SECRET'),
                'redirectUri' => env('AUTH0_REDIRECT_URI'),
                'cookieSecret' => env('APP_KEY'),
            ]);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
