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
}
