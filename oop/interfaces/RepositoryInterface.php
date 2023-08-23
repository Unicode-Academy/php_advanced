<?php
interface RepositoryInterface
{
    //Lấy tất cả bản ghi
    public function getAll();

    //Lấy 1 bản ghi
    public function find($id);

    //Thêm mới 1 bản ghi
    public function create($attributes = []);

    //Cập nhật 1 bản ghi
    public function update($id, $attributes = []);

    //Xoá 1 bản ghi
    public function delete($id);
}