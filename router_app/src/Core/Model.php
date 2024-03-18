<?php

namespace App\Core;

use PDO;
use Requtize\QueryBuilder\Connection;
use Requtize\QueryBuilder\ConnectionAdapters\PdoBridge;
use Requtize\QueryBuilder\QueryBuilder\QueryBuilderFactory;

class Model
{
    protected $db;
    public function __construct()
    {
        $dbHost = env('DB_HOST');
        $dbName = env('DB_DATABASE');
        $dbPort = env('DB_PORT');
        $dbUser = env('DB_USERNAME');
        $dbPassword = env('DB_PASSWORD');
        $dbDriver = env('DB_DRIVER');
        $dns = "$dbDriver:host=$dbHost;dbname=$dbName;port=$dbPort";
        $pdo = new PDO($dns, $dbUser, $dbPassword);
        $conn = new Connection(new PdoBridge($pdo));
        $this->db = new QueryBuilderFactory($conn);
    }
}
