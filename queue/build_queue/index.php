<?php

use Dotenv\Dotenv;

require_once 'vendor/autoload.php';
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

echo '<pre>';
print_r($_ENV['APP_NAME']);
echo '</pre>';
