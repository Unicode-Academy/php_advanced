<?php
namespace App\Models;

use System\Core\Model;

class Post extends Model
{
    public function getPosts()
    {
        return $this->db->table('posts')->orderBy('id', 'DESC')->all();
    }

    public function addPost($data)
    {
        return $this->db->table('posts')->insert($data);
    }

    public function updatePost($id, $data)
    {
        return $this->db->table('posts')->where('id', $id)->update($data);
    }

    public function findPost($id)
    {
        return $this->db->table('posts')->where('id', $id)->first();
    }

    public function deletePost($id)
    {
        return $this->db->table('posts')->where('id', $id)->delete();
    }
}
