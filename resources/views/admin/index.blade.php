@extends('layouts.admin-layout')

@section('content')
@if (session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif
<title>@yield('title', 'Quản lý sản phẩm')</title>
<h3 style ="text-align: center">DANH SÁCH SẢN PHẨM</h3>
    <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
        </style>
    <a href="{{route('productinsert')}}" class='btn btn-sm btn-success mb-1'>Thêm sản phẩm</a>

    <table class="table table-striped table-bordered" width="100%">
        <thead>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Mô tả</th>
                <th>Giá bán</th>
                <th>Hình ảnh</th>
                <th>Sửa</th>
                <th>Xóa</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->ten_san_pham }}</td>
                    <td>{{ $product->mo_ta }}</td>
                    <td>{{ $product->gia_ban }}</td>
                    <td><img src="{{ asset('img/' . $product->hinh_anh_chinh) }}" width="50px"></td>
                    <td>
                        <a href="#" class='btn btn-sm btn-primary'>Sửa</a>
                    </td>
                    <td>
                        <form action="#" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                            @csrf
                            @method('DELETE')
                            <input type='submit' class='btn btn-sm btn-danger' value='Xóa'>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
