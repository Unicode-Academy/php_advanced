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

    public function updateUser($id, $data)
    {
        return $this->db->table('users')->where('id', $id)->update($data);
    }

    public function findUser($id)
    {
        return $this->db->table('users')->where('id', $id)->first();
    }

    public function deleteUser($id)
    {
        return $this->db->table('users')->where('id', $id)->delete();
    }

    public function addUserRole($userId, $roleId)
    {
        return $this->db->table('users_roles')->insert([
            'user_id' => $userId,
            'role_id' => $roleId,
        ]);
    }

    public function addUserPermission($userId, $permissionId)
    {
        return $this->db->table('users_permissions')->insert([
            'user_id' => $userId,
            'permission_id' => $permissionId,
        ]);
    }

    public function getRoles($userId)
    {
        return $this->db->table('users_roles')->where('user_id', $userId)->all();
    }

    public function deleteUserRole($userId)
    {
        $this->db->table('users_roles')->where('user_id', $userId)->delete();
    }

    public function deleteUserPermission($userId)
    {
        $this->db->table('users_permissions')->where('user_id', $userId)->delete();
    }

    public function getPermissions($userId)
    {
        return $this->db->table('users_permissions')->where('user_id', $userId)->all();
    }
}
