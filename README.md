
# Cart implementation for laravel

[![GitHub Tests Action Status](https://github.com/rst630/laravel-cart/workflows/run-tests/badge.svg?branch=main)](https://github.com/rst630/laravel-cart/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://github.com/rst630/laravel-cart/workflows/Check%20&%20fix%20styling/badge.svg?branch=main)](https://github.com/rst630/laravel-cart/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/rst630/laravel-cart.svg?style=flat-square)](https://packagist.org/packages/rst630/laravel-cart)
[![](https://img.shields.io/github/workflow/status/rst630/laravel-cart/run-tests?label=tests)](https://github.com/rst630/laravel-cart/actions?query=workflow%3Arun-tests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/rst630/laravel-cart.svg?style=flat-square)](https://packagist.org/packages/rst630/laravel-cart)



## This package under development - please don't use it right now!

## Installation

You can install the package via composer:

```bash
composer require rst630/laravel-cart
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-cart-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-cart-config"
```

This is the contents of the published config file:
```php
return [
    'storage_table'  => 'cart_storage',
    'pivot_table'    => 'cart_products',
    'users_table'    => 'users',
    'user_pk'        => 'user_id',
    'products_table' => 'products',
];
```

## Usage

```php
Cart::get();
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [rst630](https://github.com/rst630)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
