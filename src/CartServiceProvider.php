<?php

namespace Rst630\Cart;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CartServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('cart')

            ->hasRoutes('api')

            //php artisan vendor:publish --tag=cart-config
            ->hasConfigFile('cart')

            //php artisan vendor:publish --tag=cart-migrations
            ->hasMigrations(['create_cart_table']);
    }

    public function packageRegistered()
    {
        $method = config('cart.singleton') ? 'singleton' : 'bind';

        $this->app->$method('cart', function () {
            return new Cart();
        });
    }
}
