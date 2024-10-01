<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "php_queue";
$port = 3307;

try {
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=" . $database, $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die;
}
