<?php
class Users extends Bussiness{
    protected $table = 'users';

    public function getUserDetail(){
        return $this->getDetail();
    }
}