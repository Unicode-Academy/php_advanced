<?php
require '../vendor/autoload.php';
session_start();

define('_VIEW_PATH', dirname(__DIR__) . '/src/views');
define('_CACHE_PATH', dirname(__DIR__) . '/src/cache');

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

use Pecee\SimpleRouter\SimpleRouter as Route;
use System\Core\CustomException;

Route::setDefaultNamespace('\App\Controllers');

new CustomException;


Route::start();
