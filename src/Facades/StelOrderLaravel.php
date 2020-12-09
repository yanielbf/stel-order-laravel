<?php

namespace Otiumtek\StelOrderLaravel\Facades;

use Illuminate\Support\Facades\Facade;

class StelOrderLaravel extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'stel-order-laravel';
    }
}
