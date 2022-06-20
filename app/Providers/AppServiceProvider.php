<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Turn;
use App\Models\Sector;
use App\Models\Office;
use App\Models\Mark;
use App\Models\Models;
use App\Repositories\UserRepositoryEloquent;
use App\Repositories\TurnRepositoryEloquent;
use App\Repositories\SectorRepositoryEloquent;
use App\Repositories\OfficeRepositoryEloquent;
use App\Repositories\MarkRepositoryEloquent;
use App\Repositories\ModelsRepositoryEloquent;
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

         // Mark
         $this->app->bind('App\Repositories\MarkRepositoryInterface', 'App\Repositories\MarkRepositoryEloquent');

         $this->app->bind('App\Repositories\MarkRepositoryInterface', function(){
             return new MarkRepositoryEloquent(new Mark());
         });

         // Models
         $this->app->bind('App\Repositories\ModelsRepositoryInterface', 'App\Repositories\ModelsRepositoryEloquent');

         $this->app->bind('App\Repositories\ModelsRepositoryInterface', function(){
             return new ModelsRepositoryEloquent(new Models());
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
