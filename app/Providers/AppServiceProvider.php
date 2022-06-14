<?php

namespace App\Providers;

use App\Models\Turn;
use App\Models\Sector;
use App\Repositories\TurnRepositoryEloquent;
use App\Repositories\SectorRepositoryEloquent;
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

        // Turn
        $this->app->bind('App\Repositories\TurnRepositoryInterface', 'App\Repositories\TurnRepositoryEloquent');

        $this->app->bind('App\Repositories\TurnRepositoryInterface', function(){
            return new TurnRepositoryEloquent(new Turn());
        });

         // Sector
         $this->app->bind('App\Repositories\SectorRepositoryInterface', 'App\Repositories\SectorRepositoryEloquent');

         $this->app->bind('App\Repositories\SectorRepositoryInterface', function(){
             return new SectorRepositoryEloquent(new Sector());
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
