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
        $dns = "mysql:host=localhost;dbname=mvc_training";
        $pdo = new PDO($dns, 'root', '');
        $conn = new Connection(new PdoBridge($pdo));
        $this->db = new QueryBuilderFactory($conn);
    }
}
