<?php

namespace App\Models;

use System\Core\Model;

class User extends Model
{
    public function getUsers()
    {
        return $this->db->table('users')->orderBy('id', 'DESC')->all();
    }

    public function addUser($data)
    {
        return $this->db->table('users')->insert($data);
    }
}