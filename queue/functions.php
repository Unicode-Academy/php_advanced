<?php
require_once 'connect.php';
function addJobToQueue($jobData)
{
    global $conn;
    $sql = "INSERT INTO jobs(job_data) VALUES (?)";
    $statement = $conn->prepare($sql);
    $statement->execute([$jobData]);
}

function getJobFromQueue()
{
    global $conn;
    $sql = "SELECT * FROM jobs WHERE status=:status ORDER BY id ASC LIMIT 1";
    $statement = $conn->prepare($sql);
    $statement->execute(['status' => 'pending']);
    $data = $statement->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function setJobStatus($status, $id)
{
    global $conn;
    $sql = "UPDATE jobs SET status=:status WHERE id=:id";
    $statement = $conn->prepare($sql);
    $status = $statement->execute(['status' => $status, 'id' => $id]);
}


function sendMail($to, $subject, $message)
{
    $data = "Send mail to $to with subject $subject and message $message";
    file_put_contents('./logs/sendMail.txt', $data);
}
