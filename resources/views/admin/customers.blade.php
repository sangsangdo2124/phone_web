@extends('layouts.admin-layout')

@section('title', 'Danh sách khách hàng')

@section('content')
<div class="p-4">
    <h3>Danh sách khách hàng</h3>
    <table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>SĐT</th>
            <th>Địa chỉ</th>
            <th>Ngày tạo</th>
            <th>Số đơn hàng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $cus)
        <tr>
            <td>{{ $cus->id }}</td>
            <td>{{ $cus->name }}</td>
            <td>{{ $cus->email }}</td>
            <td>{{ $cus->phone }}</td>
            <td>{{ $cus->dia_chi }}</td>
            <td>{{ $cus->created_at }}</td>
            <td><a href="{{ route('customers.orders', $cus->id) }}">{{ $cus->so_don_hang }}</a></td> 
        </tr>
        @endforeach
    </tbody>

    </table>
</div>
@endsection
