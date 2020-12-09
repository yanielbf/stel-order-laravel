<?php

namespace Otiumtek\StelOrderLaravel;
use Illuminate\Support\Facades\Http;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    const CONFIG_PATH = __DIR__ . '/../config/stel-order.php';

    public function boot()
    {
        $this->publishes([
            self::CONFIG_PATH => config_path('stel-order.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            self::CONFIG_PATH,
            'stel-order'
        );

        $this->app->bind('stel-order', function () {
            return new StelOrderLaravel();
        });

        $this->app->bind(\Otiumtek\StelOrderLaravel\Contracts\IProductService::class, function(){
            return new \Otiumtek\StelOrderLaravel\Services\ProductService(self::getClient());
        });
        $this->app->bind(\Otiumtek\StelOrderLaravel\Contracts\ICustomerService::class, function(){
            return new \Otiumtek\StelOrderLaravel\Services\CustomerService(self::getClient());
        });
        $this->app->bind(\Otiumtek\StelOrderLaravel\Contracts\IDocumentService::class, function(){
            return new \Otiumtek\StelOrderLaravel\Services\DocumentService(self::getClient());
        });
    }

    private static function getClient(){
        return Http::withOptions(['base_uri' => config('stel-order.stelorder-url')])
            ->withHeaders([
                'APIKEY' => config('stel-order.api-key')
            ]);
    }
}
