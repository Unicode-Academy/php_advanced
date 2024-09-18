<?php
session_start();
if (!empty($_SESSION['user_info'])) {
    header("Location: profile.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="/google.php">Login with Google</a>
    <a href="/github.php">Login with Github</a>
</body>

</html>
