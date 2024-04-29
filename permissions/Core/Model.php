<?php

namespace System\Core;

use PDO;
use Requtize\QueryBuilder\Connection;
use Requtize\QueryBuilder\ConnectionAdapters\PdoBridge;
use Requtize\QueryBuilder\QueryBuilder\QueryBuilderFactory;

class Model
{
    protected $db;
    public function __construct()
    {
        $dbHost = $_ENV['DB_HOST'];
        $dbName = $_ENV['DB_DATABASE'];
        $dbPort = $_ENV['DB_PORT'];
        $dbUser = $_ENV['DB_USERNAME'];
        $dbPassword = $_ENV['DB_PASSWORD'];
        $dbDriver = $_ENV['DB_DRIVER'];
        $dns = "$dbDriver:host=$dbHost;dbname=$dbName;port=$dbPort";
        $pdo = new PDO($dns, $dbUser, $dbPassword);
        $conn = new Connection(new PdoBridge($pdo));
        $this->db = new QueryBuilderFactory($conn);
    }
}
