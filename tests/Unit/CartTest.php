<?php

namespace Rst630\Cart\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Rst630\Cart\Models\CartStorage;
use Rst630\Cart\Tests\TestCase;

class CartTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function can_create_cart()
    {
        CartStorage::create(['id' => 'test']);

        $this->assertTrue(CartStorage::find('test')->exists());
    }
}
