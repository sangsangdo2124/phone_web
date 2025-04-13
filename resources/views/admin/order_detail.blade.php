@extends('layouts.admin-layout')

@section('title', 'Chi tiết đơn hàng')

@section('content')
<div class="p-4">
    <h3>Chi tiết đơn hàng #{{ $order->ma_don_hang }}</h3>
    <p>Khách hàng: <strong>{{ $order->ten_khach_hang }}</strong></p>
    <p>Địa chỉ: {{ $order->dia_chi }}</p>
    <p>Số điện thoại: {{ $order->phone }}</p>
    <p>Ngày đặt: {{ $order->ngay_dat_hang }}</p>

    <h5 class="mt-4">Danh sách sản phẩm:</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Giá bán</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderDetails as $item)
            <tr>
                <td>{{ $item->ten_san_pham }}</td>
                <td>{{ number_format($item->gia_ban) }} VND</td>
                <td>{{ $item->so_luong }}</td>
                <td>{{ number_format($item->gia_ban * $item->so_luong) }} VND</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('orders.list') }}" class="btn btn-secondary">Quay lại</a>
</div>
@endsection
