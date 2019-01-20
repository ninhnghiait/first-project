<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\UserRepository',
            'App\Repositories\UserRepositoryEloquent'
        );
        // $this->app->bind(
        //     'App\Repositories\PostRepository',
        //     'App\Repositories\PostRepositoryEloquent'
        // );
        $this->app->register(RepositoryServiceProvider::class);
    }
}
