@extends('layouts.admin-layout')

@section('content')
<title>@yield('title', 'Thêm sản phẩm')</title>
<p>Thêm sản phẩm</p>

<form method="POST" action="{{ route('products.insert') }}" enctype="multipart/form-data">
    @csrf
    <table border="1" width="50%" style="border-collapse: collapse;">
        <tr>
            <td>Mã sản phẩm</td>
            <td><input type="text" name="id"></td>
        </tr>
        <tr>
            <td>Tên sản phẩm</td>
            <td><input type="text" name="ten_san_pham"></td>
        </tr>
        <tr>
            <td>Mô tả</td>
            <td><textarea rows="10" name="mo_ta" style="resize: none"></textarea></td>
        </tr>
        <tr>
            <td>Giá bánbán</td>
            <td><input type="text" name="gia_ban"></td>
        </tr>
        <tr>
            <td>Giá gốc</td>
            <td><input type="text" name="gia_goc"></td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td><input type="file" name="hinh_anh_chinh"></td>
        </tr>
        <tr>
            <td>Phân loại sản phẩm</td>
            <td>
                <select name="danhmuc">
                    @foreach($danhmuc as $dm)
                        <option value="{{ $dm->category_id }}">{{ $dm->category_brand }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
        <td>Hãng sản xuất</td>
            <td>
                <select name="danhmuc">
                    @foreach($danhmuc as $dm)
                        <option value="{{ $dm->category_id }}">{{ $dm->category_brand }}</option>
                    @endforeach
                </select>
            </td>
</tr>
        <tr>
            <td colspan="2"><input type="submit" name="themsanpham" value="Thêm sản phẩm"></td>
        </tr>
    </table>
</form>


@endsection