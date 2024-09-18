<?php
session_start();
if (!empty($_SESSION['user_info'])) {
    unset($_SESSION['user_info']);
}
header("Location: login.php");
exit;
