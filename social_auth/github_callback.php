<?php
require_once './vendor/autoload.php';
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
session_start();

if (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
    unset($_SESSION['oauth2state']);
    exit('State không khớp, có thể là cuộc tấn công CSRF');
}

if (isset($_GET['code'])) {
    $code = $_GET['code'];

    $tokenUrl = 'https://github.com/login/oauth/access_token';
    $body = [
        'client_id' => $_ENV['GITHUB_CLIENT_ID'],
        'client_secret' => $_ENV['GITHUB_CLIENT_SECRET'],
        'code' => $code, // Mã ủy quyền nhận được từ GitHub
        'redirect_uri' => $_ENV['GITHUB_CALLBACK_URL'],
        'state' => $_SESSION['oauth2state'],
    ];

    // Gửi yêu cầu POST để đổi mã lấy access token
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $tokenUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($body));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json']); // Định dạng nhận JSON
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $tokenInfo = json_decode($response, true);

    if (!empty($tokenInfo['access_token'])) {
        $accessToken = $tokenInfo['access_token'];
        $userInfoUrl = 'https://api.github.com/user';

        // Sử dụng access token để yêu cầu thông tin người dùng
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $userInfoUrl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: token ' . $accessToken,
            'User-Agent: PHP Advanced Login', // GitHub yêu cầu User-Agent trong Header
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $user = json_decode($response, true);
        echo '<pre>';
        print_r($user);
        echo '</pre>';
    }
}
