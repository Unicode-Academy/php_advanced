<?php
require '../vendor/autoload.php';

define('_VIEW_PATH', __DIR__ . '/src/views');

use Pecee\SimpleRouter\SimpleRouter as Route;

Route::setDefaultNamespace('\App\Controllers');

// Start the routing
Route::start();
