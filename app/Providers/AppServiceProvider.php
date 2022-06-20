<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Turn;
use App\Models\Sector;
use App\Models\Office;
use App\Repositories\UserRepositoryEloquent;
use App\Repositories\TurnRepositoryEloquent;
use App\Repositories\SectorRepositoryEloquent;
use App\Repositories\OfficeRepositoryEloquent;
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

        // User
        $this->app->bind('App\Repositories\UserRepositoryInterface', 'App\Repositories\UserRepositoryEloquent');

        $this->app->bind('App\Repositories\UserRepositoryInterface', function(){
            return new UserRepositoryEloquent(new User());
        });

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

         // Office
         $this->app->bind('App\Repositories\OfficeRepositoryInterface', 'App\Repositories\OfficeRepositoryEloquent');

         $this->app->bind('App\Repositories\OfficeRepositoryInterface', function(){
             return new OfficeRepositoryEloquent(new Office());
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
