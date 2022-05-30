<?php

namespace Rst630\Cart\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Rst630\Cart\Cart
 */
class Cart extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cart';
    }

    protected static function resolveFacadeInstance($name)
    {
        return static::$app[$name];
    }
}
