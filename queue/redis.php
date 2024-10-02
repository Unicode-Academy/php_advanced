<?php

use Predis\Client;

require_once 'vendor/autoload.php';
$client = new Client();
$job1 = [
    'type' => 'sendMail',
    'data' => 'mail1@gmail.com'
];
$job2 = [
    'type' => 'compressImage',
    'data' => 'anh1.jpg'
];
// $client->rPush('task_queue', json_encode($job1));
// $client->rPush('task_queue', json_encode($job2));

// $task = $client->lPop('task_queue');
// $task = json_decode($task, true);
// echo '<pre>';
// print_r($task);
// echo '</pre>';