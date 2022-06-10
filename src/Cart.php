<?php

declare(strict_types=1);

namespace Rst630\Cart;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Rst630\Cart\Models\CartStorage;

class Cart
{
    protected mixed $id;
    protected $user_id = null;

    public function __construct()
    {
        if ($id = $this->detectId()) {
            $this->id($id);
        }
    }

    public function detectId(): mixed
    {
        return Auth::id()
            ?? $_COOKIE['cart_id']
            ?? request('cart_id')
            ?? Str::uuid();
    }

    public function id(mixed $id, string $suffix = 'cart'): Cart
    {
        $this->id = $id.'_'.$suffix;


        if (User::whereId($id)->exists()) {
            $this->user_id = $id;
        }

        return $this;
    }

    public function __get(string $name)
    {
        return $this->$name;
    }

    public function getStorage(): CartStorage
    {
        return CartStorage::firstOrCreate(['id' => $this->id, 'user_id' => $this->user_id]);
    }

    public function set(Cartable $item, int $quantity): CartStorage
    {
        $this->getStorage()->items()->updateOrCreate([
            'model_id'    => $item->id,
            'model_class' => $item::class,
        ], [
            'model_name' => $item->name,
            'quantity'   => $quantity,
        ]);

        return $this->getStorage();
    }
}
