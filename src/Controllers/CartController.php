<?php

namespace Rst630\Cart\Controllers;

use Rst630\Cart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        return Cart::getStorage();
    }
}
