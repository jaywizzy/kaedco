<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BookCodeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\BookCode\BookCodeContract',
            'App\Repositories\BookCode\EloquentBookCodeRepository');
    }
}
