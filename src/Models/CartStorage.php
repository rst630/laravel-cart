<?php

namespace Rst630\Cart\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartStorage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getTable()
    {
        return config('cart.storage_table');
    }
}
