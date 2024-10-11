<?php

use Dotenv\Dotenv;
use UnicodeQueue\Core\Drivers\DB;
use UnicodeQueue\Core\Drivers\Redis;

require_once 'vendor/autoload.php';
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$data = DB::query("SELECT * FROM jobs WHERE id=?", [3])->fetch(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($data);
echo '</pre>';
