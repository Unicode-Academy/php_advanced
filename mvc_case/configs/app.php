<?php
$config['app'] = [
    'service' => [],
    'routeMiddleware' => [
        '/*' => AuthMiddleware::class,
    ],
    'globalMiddleware' => [],
    'boot' => [
        AppServiceProvider::class,
    ],
    'page_limit' => 1
];
