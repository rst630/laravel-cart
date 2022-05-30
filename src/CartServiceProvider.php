<?php

namespace Rst630\Cart;

use Rst630\Cart\Commands\CartCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CartServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-cart')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigrations(['create_cart_table'])
            ->hasCommand(CartCommand::class);
    }
}
