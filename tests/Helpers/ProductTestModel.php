<?php

namespace Rst630\Cart\Tests\Helpers;

use Illuminate\Database\Eloquent\Model;
use Rst630\Cart\Cartable;

/**
 * @property $id
 */

class ProductTestModel extends Model implements Cartable
{
    protected $guarded = [];

    public function getTable()
    {
        return 'test_products';
    }
}
