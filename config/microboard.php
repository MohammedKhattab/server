<?php

return [
    'routes' => [
        'prefix' => 'admin',

        'namespace' => [
            'base' => 'App\\Http\\Controllers',
            'admin_directory' => 'Admin'
        ],

        'middleware' => [
            'auth', 'can:view-dashboard'
        ],

        'apiMiddleware' => [
            //
        ],

        'auth' => [
            'register' => true,
            'verify' => true,
            'reset' => true,
            'confirm' => true
        ]
    ],

    'view' => [
        'enable_notifications' => true,
        'enable_global_search' => false,
        'enable_breadcrumbs' => true
    ],

    'roles' => [
        'user' => 'App\\User',
        'default' => 'admin'
    ],

    'localizations' => [
        ['name' => 'العربية', 'code' => 'ar', 'dir' => 'rtl'],
        ['name' => 'English', 'code' => 'en', 'dir' => 'ltr'],
    ]
];
