<?php
namespace App\Models;

use System\Core\Model;

class RefreshToken extends Model
{
    public function create($data)
    {
        return $this->db->table('refresh_tokens')->insert($data);
    }

    public function find($value, $type = 'id')
    {
        return $this->db->table('refresh_tokens')->where($type, $value)->first();
    }
}
