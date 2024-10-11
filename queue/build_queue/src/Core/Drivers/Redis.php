<?php

namespace UnicodeQueue\Core\Drivers;

use UnicodeQueue\Core\Drivers\RedisConnect;

class Redis extends RedisConnect
{
    private static $redis = null;
    public function __construct()
    {
        parent::__construct();
    }

    public static function __callStatic($name, $arguments)
    {
        if (!self::$redis) {
            self::$redis = new self();
        }

        $client = self::$redis->getRedis();
        return call_user_func_array([$client, $name], $arguments);
    }
}
