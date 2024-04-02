<?php
namespace App\Models;

use System\Core\Model;

class BlacklistToken extends Model
{
    public function create($data)
    {
        return $this->db->table('blacklist_tokens')->insert($data);
    }

    public function find($value, $type = 'id')
    {
        return $this->db->table('blacklist_tokens')->where($type, $value)->first();
    }
}