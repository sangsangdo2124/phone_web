@extends('layouts.admin-layout')

@push('styles')
<style>
    <style>
    .form-table {
        width: 100%;
        max-width: 700px;
        margin: 0 auto;
        border-collapse: collapse;
    }

    .form-table td {
        padding: 10px;
        vertical-align: top;
    }

    .form-table label {
        font-weight: bold;
        display: inline-block;
        min-width: 120px;
    }

    .form-table input[type="text"],
    .form-table input[type="number"],
    .form-table input[type="file"],
    .form-table textarea {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .form-table input[type="text"],
    .form-table input[type="number"],
    .form-table input[type="file"] {
        width: 100%;
        max-width: 300px;
    }

    .form-table textarea {
        width: 100%;
        max-width: 500px;
        height: 100px;
        resize: vertical;
    }

    .button-group {
        text-align: center;
        margin-top: 20px;
    }

    .button-group button,
    .button-group a {
        padding: 10px 25px;
        font-size: 16px;
        border-radius: 6px;
        border: none;
        text-decoration: none;
        margin: 0 10px;
    }

    .button-group .btn-primary {
        background-color: #007bff;
        color: white;
    }

    .button-group .btn-secondary {
        background-color: gray;
        color: white;
    }
</style>
@endpush

@section('content')
@if (session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="container" style="max-width: 700px; margin: 0 auto; padding-top: 30px;">
        <h2 style="text-align: center; margin-bottom: 30px;">Sửa sản phẩm</h2>
        
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <table class="form-table">
            <tr>
                <td><label for="id">ID:</label></td>
                <td><input type="number" name="id" value="{{ old('id', $product->id) }}" required></td>
            </tr>
            <tr>
                <td><label for="ten_san_pham">Tên sản phẩm:</label></td>
                <td><input type="text" name="ten_san_pham" value="{{ old('ten_san_pham', $product->ten_san_pham) }}" required></td>
            </tr>
            <tr>
                <td><label for="mo_ta">Mô tả:</label></td>
                <td><textarea name="mo_ta">{{ old('mo_ta', $product->mo_ta) }}</textarea></td>
            </tr>
            <tr>
                <td><label for="gia_ban">Giá bán:</label></td>
                <td><input type="number" name="gia_ban" value="{{ old('gia_ban', $product->gia_ban) }}" required></td>
            </tr>
            <tr>
                <td><label>Hình ảnh hiện tại:</label></td>
                <td>
                    @if($product->hinh_anh_chinh)
                        <img src="{{ asset('img/' . $product->hinh_anh_chinh) }}" width="120px">
                    @else
                        Không có hình
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="hinh_anh_chinh">Chọn ảnh mới:</label></td>
                <td><input type="file" name="hinh_anh_chinh"></td>
            </tr>
        </table>

            <div style="text-align: center;">
                <button type="submit" class="btn btn-primary" style="padding: 10px 25px; font-size: 16px; border-radius: 6px;">Cập nhật</button>
                <a href="{{route('listproducts')}}" class="btn btn-secondary" style="padding: 10px 25px; font-size: 16px; border-radius: 6px; margin-left: 10px; background-color: gray; color: white; text-decoration: none;">Quay lại</a>
            </div>
        </form>
    </div>
@endsection