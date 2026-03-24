<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'coaches',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    */

    'guards' => [
        'admin' => [
            'driver' => 'session',
            'provider' => 'accounts',
        ],
        'coach' => [
            'driver' => 'session',
            'provider' => 'coaches',
        ],
    ],

    'providers' => [
        'accounts' => [
            'driver' => 'eloquent',
            'model' => App\Models\Account::class,
        ],
        'coaches' => [
            'driver' => 'eloquent',
            'model' => App\Models\Coach::class,
        ],
    ],




    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    */

    'passwords' => [

        'coaches' => [
            'provider' => 'coaches',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Password Timeout
    |--------------------------------------------------------------------------
    */

    'password_timeout' => 10800,

];
