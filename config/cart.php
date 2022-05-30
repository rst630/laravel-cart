<?php

return [
    'storage_table'  => 'cart_storage',
    'pivot_table'    => 'cart_products',
    'users_table'    => 'users',
    'user_fk'        => 'user_id',
    'products_table' => 'products',

    // Guard for cart routes
    'auth_guard'     => 'auth:web',

    // is Cart facade must return always same instance?
    'singleton'      => true,
];
