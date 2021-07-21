<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FileStoreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            'FileStoreService',
            'App\Services\FileStoreService',
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
