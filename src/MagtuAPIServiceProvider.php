<?php

namespace LArtie\MagtuAPI;

use Illuminate\Support\ServiceProvider;

/**
 * Class MagtuAPIServiceProvider
 * @package LArtie\MagtuAPI
 */
class MagtuAPIServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../tests/' => base_path('tests')
        ], 'tests');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
