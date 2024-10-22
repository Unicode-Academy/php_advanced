<?php

namespace UnicodeQueue\Core;

use Error;
use UnicodeQueue\Core\Drivers\DB;
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
        switch ($this->driver) {
            case 'redis':
                $this->addJobRedis($name, $data);
                break;
            case 'database':
                $this->addJobDb($name, $data);
                break;
            default:
                throw new Error('Queue driver not found');
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

    private function addJobDb($name, $data = [])
    {
        $jobData = json_encode([
            'job' => $name,
            'data' => $data
        ]);
        $sql = "INSERT INTO jobs(job_data, created_at, updated_at) VALUES (?, NOW(), NOW())";
        DB::query($sql, [$jobData]);
    }
}
