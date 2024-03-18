<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    static public function all()
    {
        return 'All Users';
    }

    public function getUsers()
    {
        return $this->db->table('users')->where('status', 1)->all();
    }
}
