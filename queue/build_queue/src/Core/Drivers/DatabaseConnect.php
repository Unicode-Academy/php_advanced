<?php

namespace UnicodeQueue\Core\Drivers;

use PDO;
use PDOException;

class DatabaseConnect
{
    private $db;
    public function __construct()
    {
        try {
            $driver = env('DB_DRIVER');
            $servername = env('DB_HOST');
            $port = env('DB_PORT');
            $database = env('DB_DATABASE');
            $username = env('DB_USERNAME');
            $password = env('DB_PASSWORD');
            $this->db = new PDO("$driver:host=$servername;port=$port;dbname=" . $database, $username, $password);
            // set the PDO error mode to exception
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die;
        }
    }
    public function getDb()
    {
        return $this->db;
    }
}