<?php
abstract class Model{

    protected $msg;

    const _DB_INFO = ["localhost", "root", "", "unicode"];

    //Phương thức bình thường
    public function getMessage(){
        return 'This is my message';
    }

    //Phương thức trừu tượng (Hiển thị)
    abstract protected function show();

    //Phương thức trừu tượng (thêm)
    abstract public function add();

    //Phương thức trừu tượng (cập nhật)
    abstract public function update();

    //Phương thức trừu tượng (Xoá)
    abstract public function delete();
}