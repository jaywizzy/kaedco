<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TransformerServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Repositories\Transformer\TransformerContract',
            'App\Repositories\Transformer\EloquentTransformerRepository');
    }
}
