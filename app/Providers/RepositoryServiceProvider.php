<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind("App\Interfaces\\BlogInterface", "App\Repositories\\BlogRepository");
        $this->app->bind("App\Interfaces\\CommentInterface", "App\Repositories\\CommentRepository");
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
