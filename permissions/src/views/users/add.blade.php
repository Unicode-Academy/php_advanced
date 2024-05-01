@extends('layouts.app')

@section('content')
<h1>Thêm người dùng</h1>
<form action="" method="post">
    <div class="mb-3">
        <label for="">Tên</label>
        <input type="text" name="name" class="form-control" placeholder="Tên..." required />
    </div>
    <div class="mb-3">
        <label for="">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Email..." required />
    </div>
    <div class="mb-3">
        <label for="">Mật khẩu</label>
        <input type="password" name="password" class="form-control" placeholder="Mật khẩu..." required />
    </div>
    <div class="mb-3">
        <label for="">Trạng thái</label>
        <select name="status" class="form-select" required>
            <option value="0">Chưa kích hoạt</option>
            <option value="1">Kích hoạt</option>
        </select>
    </div>
    <button class="btn btn-primary">Thêm mới</button>
</form>
@endsection