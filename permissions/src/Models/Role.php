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
}
