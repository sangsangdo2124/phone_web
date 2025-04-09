@extends('layouts.admin-layout')

@section('content')
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
    <a href="{{route('products.insert')}}" class="them">
        <input type="submit" value="Thêm sản phẩm" />
    </a>

    <table style="width:100%" border="1">
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
                        <a href="#">Sửa</a>
                    </td>
                    <td>
                        <form action="#" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Xoá</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
