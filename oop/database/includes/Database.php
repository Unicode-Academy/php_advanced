<?php
namespace App\Database;

use \PDO;
use \Exception;

class Database
{

    private $drive = _DRIVER;
    private $host = _HOST;
    private $user = _USER;
    private $pass = _PASS;
    private $dbName = _DB;
    private static $conn = null;
    private $sql = null;

    function __construct()
    {

        //Viết câu lệnh kết nối database
        try {
            if (class_exists('PDO')) {

                $dsn = $this->drive . ':dbname=' . $this->dbName . ';host=' . $this->host;

                $options = [
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //Đẩy lỗi vào ngoại lệ khi truy vấn
                ];
                if (self::$conn == null) {
                    self::$conn = new PDO($dsn, $this->user, $this->pass, $options);
                }

            }
        } catch (Exception $exception) {
            echo $exception->getMessage();
            die();
        }

    }

    public function query($sql, $data = [], $statementStatus = false)
    {

        $this->sql = $sql;

        $query = false;

        try {
            $statement = self::$conn->prepare($this->sql);

            if (empty($data)) {
                $query = $statement->execute();
            } else {
                $query = $statement->execute($data);
            }

        } catch (Exception $exception) {
            echo $exception->getMessage().'<br/>';
            echo '<b>SQL Query</b>: <i style="color: darkgreen;">'.$this->sql.'</i>';
            die(); //Dừng hết chương trình
        }

        if ($statementStatus && $query) {
            return $statement;
        }

        return $query;
    }

    private function fetch($sql){
        $statement = $this->query($sql, [], true);

        if (is_object($statement)){
            return $statement;
        }

        return false;
    }

    //Phương thức lấy tất cả bản ghi dựa vào câu lệnh SQL
    public function getRaw($sql){
        $statement = $this->fetch($sql);
        if (!empty($statement)){
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        return false;
    }

    //Phương thức lấy bản ghi đầu tiên dựa vào câu lệnh SQL
    public function firstRaw($sql){
        $statement = $this->fetch($sql);
        if (!empty($statement)){
            return $statement->fetch(PDO::FETCH_ASSOC);
        }

        return false;
    }

    //Phương thức insert()
    public function insertData($table, $dataInsert){

        $keyArr = array_keys($dataInsert);
        $fieldStr = implode(', ', $keyArr);
        $valueStr = ':'.implode(', :', $keyArr);

        $sql = 'INSERT INTO '.$table.'('.$fieldStr.') VALUES('.$valueStr.')';

        return $this->query($sql, $dataInsert);
    }

    //Phương thức update
    public function updateData($table, $dataUpdate, $condition=''){

        $updateStr = '';
        foreach ($dataUpdate as $key=>$value){
            $updateStr.=$key.'=:'.$key.', ';
        }

        $updateStr = rtrim($updateStr, ', ');

        if (!empty($condition)){
            $sql = 'UPDATE '.$table.' SET '.$updateStr.' WHERE '.$condition;
        }else{
            $sql = 'UPDATE '.$table.' SET '.$updateStr;
        }

        return $this->query($sql, $dataUpdate);
    }

    //Phương thức delete
    public function deleteData($table, $condition=''){
        if (!empty($condition)){
            $sql = "DELETE FROM $table WHERE $condition";
        }elsE{
            $sql = "DELETE FROM $table";
        }

        return $this->query($sql);
    }

    //Phương thức lấy số dòng của câu lệnh truy vấn
    public function getRows($sql){
        $statement = $this->query($sql, [], true);

        if (!empty($statement)){
            return $statement->rowCount();
        }

        return 0;
    }

    //Phương thức trả về id vừa insert
    public function insertId(){
        return self::$conn->lastInsertId();
    }

    //Phương thức trả về đối tượng $conn
    public function getPdo(){
        return self::$conn;
    }
}