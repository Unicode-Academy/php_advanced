<?php
//User Model
class User extends Model
{

    public function tableFill()
    {
        return 'users';
    }

    public function fieldFill()
    {
        return '*';
    }

    public function primaryKey()
    {
        return 'id';
    }

}
