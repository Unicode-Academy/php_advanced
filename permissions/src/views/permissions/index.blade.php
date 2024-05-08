@extends('layouts.app')

@section('content')
<h1>Phân quyền</h1>
<a href="{{url('permissions.add')}}" class="btn btn-primary my-2">Thêm vai trò</a>
<a href="#users-modal" data-bs-toggle="modal" class="btn btn-primary my-2">Gán quyền</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th width="5%">STT</th>
            <th>Tên</th>
            <th width="5%">Sửa</th>
            <th width="5%">Xóa</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roles as $key => $role)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$role->name}}</td>
            <td>
                <a href="{{url('permissions.edit', ['id' => $role->id])}}" class="btn btn-warning">Sửa</a>
            </td>
            <td>
                <form method="post" action="{{url('permissions.delete', ['id' => $role->id])}}"
                    onsubmit="return confirm('Bạn có chắc chắn?')">
                    <button class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@include('permissions.users')
@endsection