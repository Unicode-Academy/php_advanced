@extends('layouts.app')

@section('content')
<h1>Quản lý người dùng</h1>
<a href="{{url('users.add')}}" class="btn btn-primary my-2">Thêm mới</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th width="5%">STT</th>
            <th>Tên</th>
            <th>Email</th>
            <th width="20%">Trạng thái</th>
            <th width="5%">Sửa</th>
            <th width="5%">Xóa</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $key => $user)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{!! $user->status ? '<span class="badge bg-success">Kích hoạt</span>':'<span
                    class="badge bg-danger">Chưa kích hoạt</span>' !!}</td>
            <td><a href="{{url('users.edit', ['id' => $user->id])}}" class="btn btn-warning btn-sm">Sửa</a></td>
            <td>
                <form method="post" onsubmit="return confirm('Bạn có chắc chắn?')"
                    action="{{url('users.delete', ['id' => $user->id])}}">
                    <button class="btn btn-danger btn-sm">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection