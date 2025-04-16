<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Blade::if('appadmin', function () {
            return Auth::check() && Auth::user()->if_appadmin();
        });
        Blade::if('school', function () {
            return Auth::check() && Auth::user()->if_school();
        });

        Blade::if('egquestionaires', function () {
            return Auth::check() && Auth::user()->if_egquestionaires();
        });
        Blade::if('qualitysystems', function () {
            return Auth::check() && Auth::user()->if_qualitysystemss();
        });
    }
}
