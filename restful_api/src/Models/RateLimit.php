<?php

namespace App\Models;

use System\Core\Model;

class RateLimit extends Model
{
    private $table = 'rate_limit';

    public function update($ipAddress, $data = [])
    {

        $count = $this->db
            ->table($this->table)
            ->where('ip_address', $ipAddress)
            ->count();
        if (!$count) {
            return $this->create($data);
        }

        unset($data['created_at']);
        return $this->db
            ->table($this->table)
            ->where('ip_address', $ipAddress)
            ->update($data);
    }

    public function create($data = [])
    {
        $data['start_time'] = date('Y-m-d H:i:s');
        return $this->db->table($this->table)->insert($data);
    }

    public function delete($ipAddress)
    {
        return $this->db
            ->table($this->table)
            ->where('ip_address', $ipAddress)
            ->delete();
    }

    public function find($ipAddress)
    {
        return $this
            ->db
            ->table($this->table)
            ->where('ip_address', $ipAddress)
            ->first();
    }
}
