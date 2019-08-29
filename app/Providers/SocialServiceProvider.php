<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SocialServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->singleton('App\Services\Twitter', function(){

            //return new \App\Services\Twitter('dfgdfgdfg');
            //return new \App\Services\Twitter(config('services.twitter.secret'));
            return new \App\Services\Twitter(config('services.twitter.secret'));


        });
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
