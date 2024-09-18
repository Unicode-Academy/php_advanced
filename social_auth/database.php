<?php
require_once './vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
class Database
{
    private $host;
    private $user;
    private $pass;
    private $dbName;
    private $dbPort;
    private $dbDriver;
    private $conn;
    public function __construct()
    {
        try {
            $this->host = $_ENV['DB_HOST'];
            $this->user = $_ENV['DB_USERNAME'];
            $this->pass = $_ENV['DB_PASSWORD'];
            $this->dbName = $_ENV['DB_DATABASE'];
            $this->dbPort = $_ENV['DB_PORT'];
            $this->dbDriver = $_ENV['DB_DRIVER'];
            $dsn = "$this->dbDriver:host=$this->host;dbname=$this->dbName;port=$this->dbPort";
            $this->conn = new PDO($dsn, $this->user, $this->pass);
        } catch (PDOException $e) {
            // attempt to retry the connection after some timeout for example
            exit($e->getMessage());
        }
    }

    public function getPdo()
    {
        return $this->conn;
    }
}
