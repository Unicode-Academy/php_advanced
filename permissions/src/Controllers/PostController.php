<?php
namespace App\Controllers;

use App\Models\Post;

class PostController
{
    public function __construct()
    {
        $this->postModel = new Post;
    }
    public function index()
    {
        $pageTitle = 'Quản lý bài viết';
        $posts = $this->postModel->getPosts();
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
        return view('posts.edit', compact('pageTitle', 'post'));
    }

    public function update($id)
    {
        $data = input()->all();

        $this->postModel->updatePost($id, $data);
        return redirect('/posts/edit/' . $id);
    }

    public function delete($id)
    {
        $this->postModel->deletePost($id);
        return redirect('/posts');
    }
}
