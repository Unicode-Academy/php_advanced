<?php
require_once 'vendor/autoload.php';

use Predis\Client;
// require_once 'connect.php';
$client = new Client();
function addJobToQueue($jobData, $delay = 0)
{
    global $client;
    // global $conn;
    // $sql = "INSERT INTO jobs(job_data) VALUES (?)";
    // $statement = $conn->prepare($sql);
    // $statement->execute([$jobData]);
    if ($delay > 0) {
        return $client->zAdd('delayed_queue', time() + $delay, json_encode($jobData));
    }
    $client->rPush('task_queue', json_encode($jobData));
}

function getJobFromQueue()
{
    global $client;
    // global $conn;
    // $sql = "SELECT * FROM jobs WHERE status=:status ORDER BY id ASC LIMIT 1";
    // $statement = $conn->prepare($sql);
    // $statement->execute(['status' => 'pending']);
    // $data = $statement->fetch(PDO::FETCH_ASSOC);
    // return $data;
    return $client->lPop('task_queue');
}

function getJobListDelayed()
{
    global $client;
    return $client->zRangeByScore('delayed_queue', 0, time());
}

function deleteJobDelayed($task)
{
    global $client;
    return $client->zRem('delayed_queue', $task);
}

function setJobStatus($status, $id)
{
    // global $conn;
    // $sql = "UPDATE jobs SET status=:status WHERE id=:id";
    // $statement = $conn->prepare($sql);
    // $status = $statement->execute(['status' => $status, 'id' => $id]);
}

function addJobToRetry($jobData)
{
    global $client;
    $client->rPush('retry_queue', json_encode($jobData));
}

function getRetryJobFromQueue()
{
    global $client;
    return $client->lPop('retry_queue');
}


function sendMail($to, $subject, $message)
{
    $count = file_get_contents('./logs/data.txt') || 0;
    if ($count == 0) {
        file_put_contents('./logs/data.txt', 1);
        a();
    }

    $data = "Send mail to $to with subject $subject and message $message";
    file_put_contents('./logs/sendMail.txt', $data);
}
