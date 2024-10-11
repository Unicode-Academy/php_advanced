<?php

namespace UnicodeQueue\Core\Drivers;

use UnicodeQueue\Core\Drivers\DatabaseConnect;

class DB extends DatabaseConnect
{
    private static $db;
    public function __construct()
    {
        parent::__construct();
    }

    private function query($sql, $data = [], $statementStatus = false)
    {
        $conn = self::$db->getDb();
        $statement = $conn->prepare($sql);
        $status = $statement->execute($data);
        if ($statementStatus) {
            return $status;
        }
        return $statement;
    }

    public static function __callStatic($name, $arguments)
    {
        if (!self::$db) {
            self::$db = new self();
        }
        return call_user_func_array([self::$db, $name], $arguments);
    }
}
