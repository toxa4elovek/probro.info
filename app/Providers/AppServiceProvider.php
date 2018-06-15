<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Faker\Factory;
use Faker\Generator;
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

        $this->app->singleton(Generator::class, function () {
            return Factory::create('ru_RU');
        });
    }
}
