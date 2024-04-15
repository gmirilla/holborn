<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CustomHelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        //
        $this->app->singleton('helpers',function($app){
            return require app_path('Helpers/helpers.php');
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
