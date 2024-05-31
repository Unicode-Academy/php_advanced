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

    public function findUser($value, $type = 'id')
    {
        return $this->db->table('users')->where($type, $value)->first();
    }

    public function deleteUser($id)
    {
        return $this->db->table('users')->where('id', $id)->delete();
    }

    public function addUsersRoles($data)
    {
        $values = '?,?';

        //Insert Multiple
        // insert into table (fielda, fieldb, ... ) values (?,?...), (?,?...)....

        $sql = "INSERT INTO users_roles(user_id, role_id) VALUES ";
        $sql .= str_repeat("($values), ", count($data) - 1) . "($values)";

        $dataBinding = array_merge(...$data);
        return $this->db->exec($sql, $dataBinding);
    }

    public function addUsersPermissions($data)
    {
        $values = '?,?';

        $sql = "INSERT INTO users_permissions(user_id, permission_id) VALUES ";
        $sql .= str_repeat("($values), ", count($data) - 1) . "($values)";

        $dataBinding = array_merge(...$data);
        return $this->db->exec($sql, $dataBinding);
    }

    public function getRoles($userId)
    {
        return $this->db->table('users_roles')->where('user_id', $userId)->all();
    }

    public function deleteUserRole($userIds)
    {
        $this->db->table('users_roles')->whereIn('user_id', $userIds)->delete();
    }

    public function deleteUserPermission($userIds)
    {
        $this->db->table('users_permissions')->whereIn('user_id', $userIds)->delete();
    }

    public function getPermissions($userId)
    {
        return $this->db->table('users_permissions')->where('user_id', $userId)->all();
    }

    public function getPermissionsAll($userId)
    {
        return $this->db->query("SELECT permissions.value FROM users JOIN users_roles ON users.id = users_roles.user_id JOIN roles_permissions ON users_roles.role_id=roles_permissions.role_id JOIN permissions ON roles_permissions.permission_id=permissions.id WHERE users.id = ?", [$userId]);
    }
}
