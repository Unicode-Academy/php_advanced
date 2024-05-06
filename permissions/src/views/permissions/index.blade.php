@extends('layouts.app')

@section('content')
<h1>Vai trò</h1>
<a href="{{url('permissions.add')}}" class="btn btn-primary my-2">Thêm vai trò</a>
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
                <a href="#" class="btn btn-danger">Xóa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
