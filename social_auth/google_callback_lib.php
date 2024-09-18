<?php
require_once './vendor/autoload.php';
use Dotenv\Dotenv;
use League\OAuth2\Client\Provider\Google;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
session_start(); // Remove if session.auto_start=1 in php.ini
$provider = new Google([
    'clientId' => $_ENV['GOOGLE_CLIENT_ID'],
    'clientSecret' => $_ENV['GOOGLE_CLIENT_SECRET'],
    'redirectUri' => 'http://localhost:8000/google_callback_lib.php',
]);

$token = $provider->getAccessToken('authorization_code', [
    'code' => $_GET['code'],
]);

$user = $provider->getResourceOwner($token)->toArray();

echo '<pre>';
print_r($user);
echo '</pre>';

echo $user['name'];
