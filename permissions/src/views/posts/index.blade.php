@extends('layouts.app')

@section('content')
<h1>Quản lý bài viết</h1>
@if (can('posts.add'))
<a href="{{url('posts.add')}}" class="btn btn-primary my-2">Thêm mới</a>
@endif
<table class="table table-bordered">
    <thead>
        <tr>
            <th width="5%">STT</th>
            <th>Tiêu đề</th>
            @if (can('posts.update'))
            <th width="5%">Sửa</th>
            @endif
            @if (can('posts.delete'))
            <th width="5%">Xóa</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $key => $post)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$post->title}}</td>
            @if (can('posts.update'))
            <td><a href="{{url('posts.edit', ['id' => $post->id])}}" class="btn btn-warning btn-sm">Sửa</a></td>
            @endif
            @if (can('posts.delete'))
            <td>
                <form method="post" onsubmit="return confirm('Bạn có chắc chắn?')" action="{{url('posts.delete', ['id' => $post->id])}}">
                    <button class="btn btn-danger btn-sm">Xóa</button>
                </form>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
@endsection