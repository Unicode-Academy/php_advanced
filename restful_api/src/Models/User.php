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

    public function getOne($id)
    {
        return $this->db->table('users')->select('id', 'name', 'email', 'status', 'created_at', 'updated_at')->where('id', $id)->first();
    }

    public function findUserByKey($apiKey) {
        return $this->db->table('users')->where('api_key', $apiKey)->first();
    }

    public function create($data = [])
    {
        $this->db->table('users')->insert($data);
        $id = $this->db->getLastId();
        $user = $this->db->table('users')->where('id', $id)->first();
        unset($user->password);
        return $user;
    }

    public function existEmail($email, $id = 0)
    {
        $users = $this->db->table('users')->where('email', $email);
        if ($id > 0) {
            $users->where('id', '!=', $id);
        }
        $count = $users->count();
        return $count > 0;
    }

    public function update($id, $data = [])
    {
        return $this->db->table('users')->where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return $this->db->table('users')->where('id', $id)->delete();
    }

    public function deletes($ids)
    {
        return $this->db->table('users')->whereIn('id', $ids)->delete();
    }
}