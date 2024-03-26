<?php

namespace App\Models;

use System\Core\Model;

class User extends Model
{
    public function get($options = [])
    {
        extract($options);
        $users = $this->db->select('id', 'name', 'email', 'status', 'created_at', 'updated_at')->table('users')->orderBy($sort, $order);
        if ($status == 'true' || $status == 'false') {
            $users->where('status', '=', $status == 'true' ? true : false);
        }
        if ($query) {
            $users->where(function ($builder) use ($query) {
                $builder->orWhere('name', 'like', "%$query%");
                $builder->orWhere('email', 'like', "%$query%");
            });
        }
        if ($limit && isset($offset)) {
            $users->limit($limit)->offset($offset);
        }
        return $users->all();
    }

    public function getCount($options = [])
    {
        extract($options);
        $users = $this->db->select('id')->table('users')->orderBy($sort, $order);
        if ($status == 'true' || $status == 'false') {
            $users->where('status', '=', $status == 'true' ? true : false);
        }
        if ($query) {
            $users->where(function ($builder) use ($query) {
                $builder->orWhere('name', 'like', "%$query%");
                $builder->orWhere('email', 'like', "%$query%");
            });
        }
        return $users->count();
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