<?php

namespace App\Models;

use System\Core\Model;

class User extends Model
{
    public function get($options = [])
    {
        extract($options);
        return $this->db->table('users')->orderBy($sort, $order)->all();
    }

    public function create($data = [])
    {
        $this->db->table('users')->insert($data);
        $id = $this->db->getLastId();
        $user = $this->db->table('users')->where('id', $id)->first();
        unset($user->password);
        return $user;
    }

    public function existEmail($email)
    {
        $count = $this->db->table('users')->where('email', $email)->count();
        return $count > 0;
    }
}
