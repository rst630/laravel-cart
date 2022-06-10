<?php

namespace Rst630\Cart\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rst630\Cart\Collections\CartItemCollection;

class CartItem extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $incrementing = false;

//    protected $casts = [
//        'model_object' => Serialize::class,
//    ];

    public function getTable()
    {
        return config('cart.pivot_table');
    }

    public function newCollection(array $models = [])
    {
        return new CartItemCollection($models);
    }

    public function cart()
    {
        return $this->belongsTo(CartStorage::class, config('cart.storage_table').'_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo($this->model_class, 'model_id');
    }
}
