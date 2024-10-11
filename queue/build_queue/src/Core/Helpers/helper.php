<?php

use UnicodeQueue\Core\Queue;

function dispatch($job)
{
    $jobName = get_class($job);
    $data = get_object_vars($job);
    $queue = new Queue();
    $queue->addJob($jobName, $data);
}

function env($key)
{
    return $_ENV[$key] ?? null;
}
