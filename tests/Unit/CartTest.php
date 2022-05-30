<?php

namespace Rst630\Cart\Tests\Unit;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Rst630\Cart\Cartable;
use Rst630\Cart\Database\Factories\UserFactory;
use Rst630\Cart\Facades\Cart;
use Rst630\Cart\Models\CartItem;
use Rst630\Cart\Models\CartStorage;
use Rst630\Cart\Tests\Helpers\ProductModel;
use Rst630\Cart\Tests\Helpers\ProductTestModel;
use Rst630\Cart\Tests\TestCase;

class CartTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function singleton_config_working()
    {
        $cart1 = Cart::id(1);
        $cart2 = Cart::id(1);

        $method = config('cart.singleton') ? 'assertEquals' : 'assertNotEquals';

        $this->$method(spl_object_id($cart1), spl_object_id($cart2));
    }

    /**
     * @test
     */
    public function can_create_cart()
    {
        CartStorage::create(['id' => 'test']);

        $this->assertTrue(CartStorage::find('test')->exists());
    }

    /**
     * @test
     */
    public function can_set_id()
    {
        // as int
        $this->assertEquals('11_cart', Cart::id(11)->id);

        // as string
        $this->assertEquals('12_cart', Cart::id('12')->id);
    }

    /**
     * @test
     */
    public function can_set_id_with_suffix()
    {
        $this->assertEquals('11_test', Cart::id('11', 'test')->id);
    }

    /**
     * @test
     */
    public function can_detect_id()
    {
        $user = UserFactory::new()->create();

        $this->getJson(route('cart.index'))->assertUnauthorized();

        $this->actingAs($user)->getJson(route('cart.index'))
            ->assertSuccessful()
            ->assertJsonFragment(['id' => $user->id.'_cart']);
    }

    /**
     * @test
     */
    public function can_set_product()
    {
        $product = ProductModel::create([
            'name' => 'test_product',
        ]);

        $test_product = ProductTestModel::create([
            'name' => '2test_product',
        ]);

        $user = UserFactory::new()->create();

//        DB::listen(function($query) {
//            dump($query->sql,
//                $query->bindings,
//                $query->time);
//        });

        $items = Cart::id($user->id)->set($product,10)->items;

        $this->assertEquals(10,$items->first()->quantity);

        $items = Cart::id($user->id)->set($product,200)->items;

        $this->assertEquals(200,$items->first()->quantity);

        $items = Cart::id($user->id)->set($test_product,300)->items;

        dump($items->toArray());
    }
}
