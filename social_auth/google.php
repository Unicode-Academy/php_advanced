<?php
require_once './vendor/autoload.php';
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
$google_auth_url = 'https://accounts.google.com/o/oauth2/v2/auth?' . http_build_query([
    'client_id' => $_ENV['GOOGLE_CLIENT_ID'],
    'redirect_uri' => $_ENV['GOOGLE_CALLBACK_URL'],
    'response_type' => 'code',
    'scope' => 'email profile',
    'access_type' => 'offline',
]);
header('Location: ' . $google_auth_url);
exit;
