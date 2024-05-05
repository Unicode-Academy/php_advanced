<?php
namespace App\Models;

use System\Core\Model;

class Action extends Model
{
    public function getActions($moduleIds = [])
    {
        $str = rtrim(str_repeat('?,', count($moduleIds)), ',');

        return $this->db->query('SELECT * FROM actions INNER JOIN modules_actions ON actions.id=modules_actions.action_id WHERE modules_actions.module_id IN(' . $str . ')', $moduleIds);
    }
}