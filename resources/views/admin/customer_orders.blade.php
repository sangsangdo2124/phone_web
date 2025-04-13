@extends('layouts.admin-layout')

@section('title', 'Đơn hàng của ' . $user->name)

@section('content')
<div class="p-4">
    <h3>Đơn hàng của: {{ $user->name }} (ID: {{ $user->id }})</h3>
    <p>Email: {{ $user->email }} | SĐT: {{ $user->phone }}</p>

    @if(count($orders) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Hình thức thanh toán</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->ma_don_hang }}</td>
                    <td>{{ $order->ngay_dat_hang }}</td>
                    <td>{{ $order->hinh_thuc_thanh_toan }}</td>
                    <td>{{ $order->tinh_trang == 1 ? 'Đang vận chuyển' : 'Đã giao' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Khách hàng này chưa có đơn hàng nào.</p>
    @endif
    <div style="text-align: center;">
        <a href="{{route('customers.list')}}" class="btn btn-secondary" style="padding: 10px 25px; font-size: 16px; border-radius: 6px; margin-left: 10px; background-color: gray; color: white; text-decoration: none;">Quay lại</a>
    </div>
</div>
@endsection
