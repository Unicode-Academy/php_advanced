<?php

use Dotenv\Dotenv;
use UnicodeQueue\Core\Drivers\Redis;
use UnicodeQueue\Jobs\SendEmailWelcome;

require_once 'vendor/autoload.php';
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

dispatch(new SendEmailWelcome('ahihi', 'hoangan.web@gmail.com'));

// $data = Redis::lPop('task_queue');
// echo '<pre>';
// print_r($data);
// echo '</pre>';