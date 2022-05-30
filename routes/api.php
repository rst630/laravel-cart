<?php

use Illuminate\Support\Facades\Route;
use Rst630\Cart\Controllers\CartController;

Route::prefix('api')->middleware(config('cart.auth_guard'))->group(function() {
    Route::get('cart', [CartController::class, 'index'])->name('cart.index');
});
