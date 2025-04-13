@extends('layouts.admin-layout')

@section('title', 'Dashboard')

@section('content')
    <h4 class="mb-4">Bảng điều khiển</h4>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-primary">Tổng sản phẩm</h6>
                    <h3>120</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-success">Đơn hàng hôm nay</h6>
                    <h3>35</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-warning">Khách hàng mới</h6>
                    <h3>12</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
