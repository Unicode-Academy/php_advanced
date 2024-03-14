<?php
$config['app'] = [
    'service' => [],
    'routeMiddleware' => [
        '/*' => AuthMiddleware::class,
        '/auth/*' => GuestMiddleware::class,
    ],
    'globalMiddleware' => [],
    'boot' => [
        AppServiceProvider::class,
    ],
    'page_limit' => 10,
];
