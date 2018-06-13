<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Faker\Factory;
use Faker\Generator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Generator::class, function () {
            return Factory::create('ru_RU');
        });
    }
}
