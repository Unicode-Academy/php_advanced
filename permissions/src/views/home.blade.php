@extends('layouts.app')

@section('content')
<h1>Trang chủ</h1>
<h2>{{rand(5, 10)}}</h2>
@if ($status)
<h3>{{$title}}</h3>
@endif
@endsection
