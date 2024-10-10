<?php

use Dotenv\Dotenv;
use UnicodeQueue\Core\Drivers\DatabaseConnect;
use UnicodeQueue\Core\Drivers\RedisConnect;

require_once 'vendor/autoload.php';
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$dbConnect = new DatabaseConnect();
$db = $dbConnect->getDb();
$sql = "SELECT * FROM jobs";
$statement = $db->prepare($sql);
$statement->execute();
$data = $statement->fetchAll();
echo '<pre>';
print_r($data);
echo '</pre>';
