<?php

namespace App\Providers;

use App\Models\Turn;
use App\Repositories\TurnRepositoryEloquent;
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
        $this->app->bind('App\Repositories\TurnRepositoryInterface', 'App\Repositories\TurnRepositoryEloquent');

        $this->app->bind('App\Repositories\TurnRepositoryInterface', function(){
            return new TurnRepositoryEloquent(new Turn());
        });
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
