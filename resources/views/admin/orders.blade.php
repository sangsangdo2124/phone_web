@extends('layouts.admin-layout')

@section('title', 'Quản lý đơn hàng')

@section('content')
<div class="p-4">
    <h3 style ="text-align: center">Danh sách đơn hàng</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên khách hàng</th>
                <th>Địa chỉ</th>
                <th>SĐT</th>
                <th>Ngày đặt</th>
                <th>Trạng thái</th>
                <th></th>
                <th></th>

            </tr>
        </thead>
        <tbody>
    @forelse($orders as $order)
        <tr>
        <td>{{ $order->ma_don_hang }}</td>
        <td>{{ $order->ten_KH }}</td>
        <td>{{ $order->dia_chi_KH }}</td>
        <td>{{ $order->sdt_KH }}</td>
        <td>{{ $order->ngay_dat_hang }}</td>
        <td>{{ $order->trang_thai }}
        @if ($order->tinh_trang == 1)
        <form action="{{ route('orders.updateStatus', $order->ma_don_hang) }}" method="POST" style="display:inline;">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-warning btn-sm"
                onclick="return confirm('Xác nhận đã giao đơn hàng này?')">
                Đánh dấu đã giao
            </button>
        </form>
        @endif
        </td>
            <td>
                <a href="{{ route('orders.delete', $order->ma_don_hang) }}" class="btn btn-danger btn-sm"
                    onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này?')">Xóa</a>
            </td>
            <td>
                <a href="{{ route('orders.detail', $order->ma_don_hang) }}" class="btn btn-info btn-sm">Xem chi tiết</a>
            </td>
            
        </tr>
    @empty
        <tr>
            <td colspan="8">Không có đơn hàng nào.</td>
        </tr>
    @endforelse
</tbody>

    </table>
</div>
@endsection
