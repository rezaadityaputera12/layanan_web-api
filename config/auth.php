<?php

return [
    'defaults' => [
        'guard' => 'api',
    ],

    'guards' => [
        'api' => [
            'driver' => 'jwt',
            'provider' => 'users',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
    ],
    'password' => [
        'users' => [
        'provider' => 'users',
         'table' => 'password_resets',
         'expire' => 60,  
    ]
]
        ];
