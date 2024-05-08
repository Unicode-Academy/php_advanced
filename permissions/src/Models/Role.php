<?php

namespace App\Models;

use System\Core\Model;

class Role extends Model
{
    public function getRoles()
    {
        $roles = $this->db->table('roles')->orderBy('name', 'ASC')->all();
        return $roles;
    }

    public function addRole($data)
    {
        $this->db->table('roles')->insert($data);
        return $this->db->getLastId();
    }

    public function addPermission($roleId, $permissionId)
    {
        return $this->db->table('roles_permissions')->insert([
            'role_id' => $roleId,
            'permission_id' => $permissionId,
        ]);
    }
    public function deletePermissions($roleId)
    {
        return $this->db->table('roles_permissions')->where('role_id', $roleId)->delete();
    }
    public function getRole($id)
    {
        return $this->db->table('roles')->where('id', $id)->first();
    }

    public function getPermissions($roleId)
    {
        return $this->db->query("SELECT permissions.* FROM permissions INNER JOIN roles_permissions ON permissions.id=roles_permissions.permission_id WHERE roles_permissions.role_id=?", [$roleId]);
    }

    public function updateRole($id, $data = [])
    {
        return $this->db->table('roles')->where('id', $id)->update($data);
    }

    public function deleteRole($id)
    {
        return $this->db->table('roles')->where('id', $id)->delete();
    }
}