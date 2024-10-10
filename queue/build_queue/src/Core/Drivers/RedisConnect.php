<?php

namespace UnicodeQueue\Core\Drivers;

use Predis\Client;

class RedisConnect
{
    private $client;
    public function __construct()
    {
        if (!$this->client) {
            try {
                $this->client = new Client([
                    'scheme' => 'tcp',
                    'host'   => env('REDIS_HOST'),
                    'port'   => env('REDIS_PORT'),
                ]);
                $this->client->connect();
            } catch (\Exception $e) {
                echo $e->getMessage();
                die;
            }
        }
    }
    public function getRedis()
    {
        return $this->client;
    }
}
