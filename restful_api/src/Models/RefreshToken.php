<?php
namespace App\Models;

use System\Core\Model;

class RefreshToken extends Model
{
    public function create($data) {
        return $this->db->table('refresh_tokens')->insert($data);
    }
}