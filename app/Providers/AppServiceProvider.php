<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Products\ProductRepositoryInterface::class,
            \App\Repositories\Products\ProductRepositoryEloquent::class
        );
        $this->app->singleton(
            \App\Repositories\Categories\CategoryRepositoryInterface::class,
            \App\Repositories\Categories\CategoryRepositoryEloquent::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
