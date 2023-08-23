<?php
abstract class BaseRepository implements RepositoryInterface
{
    //model muốn tương tác
    protected $model;

    //khởi tạo
    public function __construct()
    {
        $this->setModel();
    }

    //lấy model tương ứng
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->model = $this->getModel();
    }

    public function getAll()
    {
        return 'get all';
    }

    public function find($id)
    {
        return 'get one';
    }

    public function create($attributes = [])
    {
        return 'create record';
    }

    public function update($id, $attributes = [])
    {
        return 'update record';
    }

    public function delete($id)
    {
       return 'delete record';
    }
}