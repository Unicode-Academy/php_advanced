<?php
require '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

use Pecee\SimpleRouter\SimpleRouter as Route;

Route::setDefaultNamespace('\App\Controllers');

// Start the routing
Route::start();
