<?php

namespace Rst630\Cart\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Orchestra\Testbench\TestCase as Orchestra;
use Rst630\Cart\CartServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Rst630\\Cart\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            CartServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        $files = glob(__DIR__.'/../database/migrations/*');

        foreach ($files as $file) {
            $migration = include $file;
            $migration->up();
        }

        Schema::create(config('cart.products_table'),function($table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('test_products',function($table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }
}
