<?php
session_start();
if (empty($_SESSION['user_info'])) {
    header("Location: login.php");
    exit;
}
echo 'Chào bạn: ' . $_SESSION['user_info']['name'].' - <a href="logout.php">Đăng xuất</a>';