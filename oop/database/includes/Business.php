<?php
namespace App\Database;
use App\Database\Database;

class Business extends Database{

    protected $table = null; //table
    protected $primaryKey = 'id'; //primary key table
    protected $field = '*'; //field select

    public function __construct(){
        parent::__construct(); //gọi __construct của class Database

        $this->table = $this->getTable();
    }

    public function get($where=''){


        $tableName = $this->table;
        $fieldSelect = $this->field;

        $sql = "SELECT $fieldSelect FROM $tableName";

        //Nếu có where, nối câu lệnh sql với mệnh đề where
        if (!empty($where)){
            $sql.=" WHERE $where";
        }

        return $this->getRaw($sql);
    }

    //Lấy 1 bản ghi theo điều kiện where
    public function first($where=''){
        $tableName = $this->table;
        $fieldSelect = $this->field;

        $sql = "SELECT $fieldSelect FROM $tableName";

        //Nếu có where, nối câu lệnh sql với mệnh đề where
        if (!empty($where)){
            $sql.=" WHERE $where";
        }

        return $this->firstRaw($sql);
    }

    //Lấy 1 bản ghi theo khoá chính
    public function find($id){
        $findBy = $this->primaryKey;
        $where = "$findBy = $id";

        return $this->first($where);
    }

    //Phương thức đếm số dòng của câu lệnh truy vấn
    public function count($where = ''){
        $tableName = $this->table;
        $fieldSelect = $this->primaryKey;

        $sql = "SELECT $fieldSelect FROM $tableName";

        if (!empty($where)){
            $sql.=" WHERE $where";
        }

        return $this->getRows($sql);
    }

    //Phương thức insert
    public function insert($dataInsert){
        $tableName = $this->table;

        return $this->insertData($tableName, $dataInsert);
    }

    //Phương thức update
    public function update($dataUpdate, $id){
        $updateBy = $this->primaryKey;
        $condition = "$updateBy = ".$id;
        $tableName = $this->table;

        return $this->updateData($tableName, $dataUpdate, $condition);
    }

    //Phương thức delete
    public function delete($id){
        $deleteBy = $this->primaryKey;
        $tableName = $this->table;
        $condition = "$deleteBy = $id";

        return $this->deleteData($tableName, $condition);
    }

    private function getTable(){
        $currentClassObj = new \ReflectionClass($this);

        if (!empty($currentClassObj)){
            $currentClass = $currentClassObj->getShortName();

            if (!empty($currentClass)){

                $tableName = preg_replace('/([A-Z])/', '_$1', $currentClass);

                $tableName = trim($tableName, '_');

                $tableName = strtolower($tableName);

                //Users => users
                //ProductCategory => product_category

                return $tableName;
            }
        }

        return;
    }
}