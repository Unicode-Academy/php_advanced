@extends('layouts.app')

@section('content')

<h1>Phân quyền</h1>
@if (can('permissions.add'))
<a href="{{url('permissions.add')}}" class="btn btn-primary my-2">Thêm vai trò</a>
@endif
@if (can('permissions.assign'))
<a href="#users-modal" data-bs-toggle="modal" class="btn btn-primary my-2">Gán quyền</a>
@endif
<table class="table table-bordered">
    <thead>
        <tr>
            <th width="5%">STT</th>
            <th>Tên</th>
            @if (can('permissions.update'))
            <th width="5%">Sửa</th>
            @endif
            @if (can('permissions.delete'))
            <th width="5%">Xóa</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($roles as $key => $role)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$role->name}}</td>
            @if (can('permissions.update'))
            <td>
                <a href="{{url('permissions.edit', ['id' => $role->id])}}" class="btn btn-warning">Sửa</a>
            </td>
            @endif
            @if (can('permissions.delete'))
            <td>
                <form method="post" action="{{url('permissions.delete', ['id' => $role->id])}}" onsubmit="return confirm('Bạn có chắc chắn?')">
                    <button class="btn btn-danger">Xóa</button>
                </form>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
@include('permissions.users')
@endsection