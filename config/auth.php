<?php

return [


    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],
 'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        //ADMIN
        'admin' => [
            'driver'    => 'session',
            'provider' => 'admins',
        ],
    ],

  
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        //ADMIN
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

  
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
