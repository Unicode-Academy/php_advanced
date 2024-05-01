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
            <td><a href="#" class="btn btn-warning btn-sm">Sửa</a></td>
            <td><a href="#" class="btn btn-danger btn-sm">Xóa</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection