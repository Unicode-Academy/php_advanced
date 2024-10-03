<?php
require_once 'vendor/autoload.php';

use Predis\Client;
// require_once 'connect.php';
$client = new Client();
function addJobToQueue($jobData)
{
    global $client;
    // global $conn;
    // $sql = "INSERT INTO jobs(job_data) VALUES (?)";
    // $statement = $conn->prepare($sql);
    // $statement->execute([$jobData]);
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

function setJobStatus($status, $id)
{
    // global $conn;
    // $sql = "UPDATE jobs SET status=:status WHERE id=:id";
    // $statement = $conn->prepare($sql);
    // $status = $statement->execute(['status' => $status, 'id' => $id]);
}


function sendMail($to, $subject, $message)
{
    $data = "Send mail to $to with subject $subject and message $message";
    file_put_contents('./logs/sendMail.txt', $data);
}
