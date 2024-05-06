@extends('layouts.app')

@section('content')
<h1>Cập nhật vai trò</h1>
<form action="" method="post">
    <div class="mb-3">
        <label for="">Tên vai trò</label>
        <input type="text" name="name" class="form-control" placeholder="Tên vai trò..." value="{{$role->name}}"
            required />
    </div>
    <p>Danh sách quyền</p>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="20%">Chức năng</th>
                <th>Quyền</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($modules as $module)
            <tr>
                <td>{{$module->title}}</td>
                <td>
                    <div class="row">
                        @foreach ($module->actions as $action)
                        <div class="col-3">
                            <label>
                                <input type="checkbox" name="permissions[]" value="{{$module->name.'.'.$action->name}}"
                                    {{isPermission($role->permissions, $module->name.'.'.$action->name) ? 'checked': ''}} />
                                {{$action->title}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
</form>
@endsection