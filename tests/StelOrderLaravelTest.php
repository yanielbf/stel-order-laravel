<?php

namespace Otiumtek\StelOrderLaravel\Tests;

use Otiumtek\StelOrderLaravel\Facades\StelOrderLaravel;
use Otiumtek\StelOrderLaravel\ServiceProvider;
use Orchestra\Testbench\TestCase;

class StelOrderLaravelTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'stel-order-laravel' => StelOrderLaravel::class,
        ];
    }

    public function testExample()
    {
        $this->assertEquals(1, 1);
    }
}
