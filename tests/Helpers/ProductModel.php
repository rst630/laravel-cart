<?php

namespace Rst630\Cart\Tests\Helpers;

use Illuminate\Database\Eloquent\Model;
use Rst630\Cart\Cartable;

/**
 * @property $id
 */

class ProductModel extends Model implements Cartable
{
    protected $guarded = [];

    public function getTable()
    {
        return config('cart.products_table');
    }
}
