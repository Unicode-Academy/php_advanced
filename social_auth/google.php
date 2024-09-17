<?php 
$google_auth_url = 'https://accounts.google.com/o/oauth2/v2/auth?' . http_build_query([
    'client_id' => '733332492650-7r58a68tuf1f79l03g93rmjkorh6nu15.apps.googleusercontent.com',
    'redirect_uri' => 'http://localhost:8000/google_callback.php',
    'response_type' => 'code',
    'scope' => 'email profile',
    'access_type' => 'offline',
]);
header('Location: ' . $google_auth_url);
exit;