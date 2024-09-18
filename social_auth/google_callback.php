<?php
session_start();
require_once './vendor/autoload.php';
require_once './database.php';
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
$db = new Database();
if (!empty($_GET['code'])) {
    $code = $_GET['code'];
    $tokenUrl = 'https://oauth2.googleapis.com/token';
    $body = [
        'code' => $code,
        'client_id' => $_ENV['GOOGLE_CLIENT_ID'],
        'client_secret' => $_ENV['GOOGLE_CLIENT_SECRET'],
        'redirect_uri' => $_ENV['GOOGLE_CALLBACK_URL'],
        'grant_type' => 'authorization_code',
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $tokenUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($body));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $tokenInfo = json_decode($response, true);
    if (!empty($tokenInfo['access_token'])) {
        $accessToken = $tokenInfo['access_token'];

        $userInfoUrl = 'https://www.googleapis.com/oauth2/v1/userinfo?access_token=' . $accessToken;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $userInfoUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $user = json_decode($response, true);
        if (!empty($user)) {
            $name = $user['name'];
            $email = $user['email'];
            //Kiểm tra provider
            $sql = "SELECT id FROM providers WHERE name=?";
            $statement = $db->getPdo()->prepare($sql);
            $statement->execute(['google']);
            $provider = $statement->fetch();
            if (!$provider) {
                $sql = "INSERT INTO providers (name) VALUES (?)";
                $statement = $db->getPdo()->prepare($sql);
                $statement->execute(['google']);
                $providerId = $db->getPdo()->lastInsertId();
            } else {
                $providerId = $provider['id'];
            }

            //Kiểm tra user
            $sql = "SELECT * FROM users WHERE email=? AND provider_id=?";
            $statement = $db->getPdo()->prepare($sql);
            $statement->execute([$email, $providerId]);
            $user = $statement->fetch();
            if (!$user) {
                $sql = "INSERT INTO users (name, email, provider_id) VALUES (?, ?, ?)";
                $statement = $db->getPdo()->prepare($sql);
                $statement->execute([$name, $email, $providerId]);
                $userId = $db->getPdo()->lastInsertId();
                $sql = "SELECT * FROM users WHERE id=?";
                $statement = $db->getPdo()->prepare($sql);
                $statement->execute([$userId]);
                $user = $statement->fetch();
            }
            $_SESSION['user_info'] = $user;
            header("Location: profile.php");
            exit;
        }
    }
}
