<?php

namespace UnicodeQueue\Core;

use UnicodeQueue\Core\Drivers\Redis;

class Queue
{
    private $driver;
    public function __construct()
    {
        $this->driver = env('QUEUE_DRIVER');
    }
    public function addJob($name, $data = [])
    {
        if ($this->driver == "redis") {
            $this->addJobRedis($name, $data);
        }
    }

    private function addJobRedis($name, $data = [])
    {
        $jobData = [
            'job' => $name,
            'data' => $data
        ];
        Redis::rPush('task_queue', json_encode($jobData));
    }
}
