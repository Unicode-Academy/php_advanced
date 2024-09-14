<?php
namespace App\Controllers;

use App\Models\Post;
use System\Core\Auth;

class PostController
{
    public function __construct()
    {
        $this->postModel = new Post;
    }
    public function index()
    {
        $pageTitle = 'Quản lý bài viết';
        $user = Auth::user();
        $posts = $this->postModel->getPosts($user->is_root == 0 && !in_array('posts.read_all', request()->permissions) ? $user->id : null);
        return view('posts.index', compact('pageTitle', 'posts'));
    }

    public function add()
    {
        $pageTitle = 'Thêm bài viết';
        return view('posts.add', compact('pageTitle'));
    }

    public function handleAdd()
    {
        $data = input()->all();
        $data['user_id'] = Auth::user()->id;
        $this->postModel->addPost($data);
        return redirect('/posts');
    }

    public function edit($id)
    {
        $pageTitle = 'Cập nhật bài viết';
        $post = $this->postModel->findPost($id);
        if (!$post) {
            throw new \Error('Post not found');
        }
        if (Auth::user()->is_root == 0 && $post->user_id !== Auth::user()->id) {
            throw new \Error('Permission denied');
        }
        return view('posts.edit', compact('pageTitle', 'post'));
    }

    public function update($id)
    {
        $data = input()->all();
        $post = $this->postModel->findPost($id);
        if (!$post) {
            throw new \Error('Post not found');
        }
        if (Auth::user()->is_root == 0 && $post->user_id !== Auth::user()->id) {
            throw new \Error('Permission denied');
        }
        $this->postModel->updatePost($id, $data);
        return redirect('/posts/edit/' . $id);
    }

    public function delete($id)
    {
        $post = $this->postModel->findPost($id);
        if (!$post) {
            throw new \Error('Post not found');
        }
        if (Auth::user()->is_root == 0 && $post->user_id !== Auth::user()->id) {
            throw new \Error('Permission denied');
        }
        $this->postModel->deletePost($id);

        return redirect('/posts');
    }
}