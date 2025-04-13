@extends('layouts.admin-layout')

@section('content')
<title>@yield('title', 'Thêm sản phẩm')</title>
<div class="panel panel-default" style="width:50%; margin:0 auto;">
<div class="panel-body">
@if ($errors->any())
    <div style='color:red; margin:0 auto'>
        <div>
        {{ __('Whoops! Something went wrong.') }}
        </div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('productsave', ['action' => $action]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($action == "add")
        <div style='text-align:center;font-weight:bold;color:#15c;'>THÊM SẢN PHẨM</div>
    @else
        <div style='text-align:center;font-weight:bold;color:#15c;'>SỬA SẢN PHẨM</div>
    @endif

    <label>Mã sản phẩm</label>
    <input type="text" class="form-control form-control-sm" name="id" value="{{ $product->id ?? old('id') }}">

    <label>Tên sản phẩm</label>
    <input type="text" class="form-control form-control-sm" name="ten_san_pham" value="{{ $product->ten_san_pham ?? old('ten_san_pham') }}">

    <label>Mô tả</label>
    <textarea class="form-control form-control-sm" name="mo_ta" rows="4" style="resize:none">{{ $product->mo_ta ?? old('mo_ta') }}</textarea>

    <label>Giá bán</label>
    <input type="text" class="form-control form-control-sm" name="gia_ban" value="{{ $product->gia_ban ?? old('gia_ban') }}">

    <label>Tồn kho</label>
    <input type="text" class="form-control form-control-sm" name="ton_kho" value="{{ $product->ton_kho ?? old('ton_kho') }}">

    <label>Trạng thái</label>
        <input type="hidden" name="trang_thai" value="available">
        <div class="form-control" readonly>available</div>
    <label>Phân loại sản phẩm</label>
    <select name="id_phan_loai" class="form-control form-control-sm">
        @php
            $selected = $product->id_phan_loai ?? old('id_phan_loai');
        @endphp
        @foreach($phanloai as $row)
            <option value="{{ $row->id }}" {{ $selected == $row->id ? 'selected' : '' }}>{{ $row->ten_loai_san_pham }}</option>
        @endforeach
    </select>

    <label>Hãng sản xuất</label>
    <select name="id_hang_sx" class="form-control form-control-sm">
        @php
            $selectedHSX = $product->id_hangsx ?? old('id_hang_sx');
        @endphp
        @foreach($hangsx as $sx)
            <option value="{{ $sx->id }}" {{ $selectedHSX == $sx->id ? 'selected' : '' }}>{{ $sx->ten_nha_san_xuat }}</option>
        @endforeach
    </select>

    <label>Hình ảnh chính</label><br>
    @if($action == 'edit' && isset($product->hinh_anh_chinh))
        <img src="{{ asset('/img' . $product->hinh_anh_chinh) }}" width="50px" class='mb-1'/>
        <input type ='hidden' name='id' value='{{ $product->id }}'>
    @endif
    <input type="file" name="hinh_anh_chinh" accept="image/*" class="form-control-file"><br>
    <label>Loại hàng</label>
    <select name="is_new" class="form-control form-control-sm">
        <option value="1" {{ (old('is_new') ?? ($product->is_new ?? '')) == '1' ? 'selected' : '' }}>Hàng mới</option>
        <option value="0" {{ (old('is_new') ?? ($product->is_new ?? '')) == '0' ? 'selected' : '' }}>Hàng cũ</option>
    </select>
    <div style='text-align:center;'>
        <input type='submit' class='btn btn-primary mt-2' value='Lưu'>
    </div>
</form>
</div>
</div>
@endsection