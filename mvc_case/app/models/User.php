<?php
//User Model
class User extends Model
{

    public function tableFill()
    {
        return 'users';
    }

    public function fieldFill()
    {
        return '*';
    }

    public function primaryKey()
    {
        return 'id';
    }

    public function getUsers($filters = [], $keyword = '', $limit)
    {

        $users = $this->db
            ->table($this->tableFill())
            ->select('users.*, groups.name as group_name')
            ->orderBy('users.created_at', 'DESC')
            ->join('groups', 'users.group_id=groups.id');

        if (!empty($filters)) {
            foreach ($filters as $key => $value) {
                $users->where($key, '=', $value);
            }
        }

        if (!empty($keyword)) {

            $users->where(function ($query) use ($keyword) {
                $query
                    ->where('users.name', 'like', "%$keyword%")
                    ->orWhere('users.email', 'like', "%$keyword%");
            });

        }

        $users = $users->paginate($limit);
        return $users;

    }
}