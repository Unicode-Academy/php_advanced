<?php
namespace App\Models;

use System\Core\Model;

class Post extends Model
{
    public function getPosts($userId = null)
    {
        // $posts = $this->db->table('posts')->orderBy('id', 'DESC');
        // if ($userId) {
        //     $posts->where('user_id', '=', $userId);
        // }
        // return $posts->all();
        $sql = "SELECT posts.*, users.name AS user_name FROM posts INNER JOIN users ON posts.user_id = users.id";
        if ($userId) {
            $sql.=" WHERE posts.user_id = $userId";
        }
        $sql.=" ORDER BY id DESC";
        return $this->db->query($sql);
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