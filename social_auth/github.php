<?php
session_start();
if (!empty($_SESSION['user_info'])) {
    header("Location: profile.php");
    exit;
}
require_once './vendor/autoload.php';
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$state = md5(uniqid());
$_SESSION['oauth2state'] = $state;

$githubAuthUrl = 'https://github.com/login/oauth/authorize?' . http_build_query([
    'client_id' => $_ENV['GITHUB_CLIENT_ID'],
    'redirect_uri' => $_ENV['GITHUB_CALLBACK_URL'], // URL callback
    'scope' => 'user', // Phạm vi quyền truy cập
    'state' => $state, // Tham số state để chống tấn công CSRF
]);

header('Location: ' . $githubAuthUrl);
exit;
