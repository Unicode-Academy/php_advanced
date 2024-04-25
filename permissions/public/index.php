<?php
require '../vendor/autoload.php';

define('_VIEW_PATH', dirname(__DIR__) . '/src/views');
define('_CACHE_PATH', dirname(__DIR__) . '/src/cache');

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

use Pecee\SimpleRouter\SimpleRouter as Route;

Route::setDefaultNamespace('\App\Controllers');

// Start the routing
Route::start();