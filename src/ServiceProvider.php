<?php

namespace Otiumtek\StelOrderLaravel;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    const CONFIG_PATH = __DIR__ . '/../config/stel-order-laravel.php';

    public function boot()
    {
        $this->publishes([
            self::CONFIG_PATH => config_path('stel-order-laravel.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            self::CONFIG_PATH,
            'stel-order-laravel'
        );

        $this->app->bind('stel-order-laravel', function () {
            return new StelOrderLaravel();
        });
    }
}
