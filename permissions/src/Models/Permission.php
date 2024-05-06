<?php

namespace App\Models;

use System\Core\Model;

class Permission extends Model
{
    public function addPermission($data)
    {
        $this->db->table('permissions')->insert($data);
        return $this->db->getLastId();
    }

    public function getPermission($value, $type = 'id')
    {
        return $this->db->table('permissions')->where($type, $value)->first();
    }
}
