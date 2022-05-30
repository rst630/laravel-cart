<?php

namespace Rst630\Cart\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class CartStorage extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $keyType = 'string';

    public $incrementing = false;

    protected $with = ['items'];

    public function getTable()
    {
        return config('cart.storage_table');
    }

    public function items():hasMany
    {
        return $this->hasMany(CartItem::class,config('cart.storage_table').'_id','id');
    }
}
