@extends('layouts.app')

@section('content')
<h1>Thêm sản phẩm</h1>
<form action="" method="post">
    <div class="mb-3">
        <label for="">Tên</label>
        <input type="text" name="name" class="form-control" placeholder="Tên..." value="{{$product->name}}" required />
    </div>
    <div class="mb-3">
        <label for="">Giá</label>
        <input type="number" name="price" class="form-control" placeholder="Giá..." value="{{$product->price}}"
            required />
    </div>

    <button class="btn btn-primary">Cập nhật</button>
</form>
@endsection
