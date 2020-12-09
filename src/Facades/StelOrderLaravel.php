<?php

namespace Otiumtek\StelOrderLaravelLaravel\Facades;

use Illuminate\Support\Facades\Facade;

class StelOrderLaravel extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'stel-order-laravel';
    }
}
