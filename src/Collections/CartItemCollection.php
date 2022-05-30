<?php

namespace Rst630\Cart\Collections;

use Illuminate\Database\Eloquent\Collection;

class CartItemCollection extends Collection
{
    public function products()
    {
        return $this->map->product;
    }
}
