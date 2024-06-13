@extends('layouts.app')

@section('content')
<h1>Quản lý sản phẩm</h1>
@if (can('products.add'))
<a href="{{url('products.add')}}" class="btn btn-primary my-2">Thêm mới</a>
@endif
<table class="table table-bordered">
    <thead>
        <tr>
            <th width="5%">STT</th>
            <th>Tên</th>
            <th>Giá</th>
            @if (can('products.update'))
            <th width="5%">Sửa</th>
            @endif
            @if (can('products.delete'))
            <th width="5%">Xóa</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $key => $product)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->price ? number_format($product->price): 0}}</td>
            @if (can('products.update'))
            <td><a href="{{url('products.edit', ['id' => $product->id])}}" class="btn btn-warning btn-sm">Sửa</a></td>
            @endif
            @if (can('products.delete'))
            <td>
                <form method="post" onsubmit="return confirm('Bạn có chắc chắn?')" action="{{url('products.delete', ['id' => $product->id])}}">
                    <button class="btn btn-danger btn-sm">Xóa</button>
                </form>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
@endsection