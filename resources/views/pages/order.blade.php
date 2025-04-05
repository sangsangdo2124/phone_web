<x-web-layout>
    <x-slot name='title'>
        Đặt hàng
    </x-slot>
    <style>
        .img_chinh {
            width: 100px;
            height: 100px;

        }
    </style>


    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb-tree">
                        <li><a href="{{route('index')}}">Home</a></li>
                        <li class="active">Giỏ hàng</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->

    <!-- Order Details -->
    <div style='color:#15c; font-weight:bold;font-size:15px;text-align:center'>DANH SÁCH SẢN PHẨM</div><br>

    <table class='table table-bordered text-center' style='margin:0 auto; width:70%'>
        <thead style='text-align:center'>
            <th>STT</th>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Xóa</th>
        </thead>
        <tbody>
            @php
                $tongTien = 0;
            @endphp
            @foreach($data as $key => $row)
                        <tr>
                            <td align='center'>{{$key + 1}}</td>
                            <td><img class="img_chinh" src="{{ asset('img/' . $row->hinh_anh_chinh) }}"></td>
                            <td>{{$row->ten_san_pham}}</td>
                            <td align='center'>{{$quantity[$row->id]}}</td>
                            <td align='center'>{{number_format($row->gia_ban, 0, ',', '.')}}đ</td>
                            <td align='center'>
                                <form method='post' action="{{route('cartdelete')}}">
                                    <input type='hidden' value='{{$row->id}}' name='id'>
                                    <input type='submit' class='btn btn-sm btn-danger' value='Xóa'>
                                    {{ csrf_field() }}
                                </form>
                            </td>
                        </tr>
                        @php
                            $tongTien += $quantity[$row->id] * $row->gia_ban;
                        @endphp
            @endforeach
            <tr>
                <td colspan='3' align='center'><b>Tổng cộng</b></td>
                <td style='text-align: center'><b>{{number_format($tongTien, 0, ',', '.')}}đ</b></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <div style='font-weight:bold;width:70%;margin:0 auto;text-align:center;'>
        @auth
            @if(count($data) > 0)
                <form method='post' action="{{route('ordercreate')}}">
                    Hình thức thanh toán <br>
                    <div class='d-inline-flex'>
                        <select name='hinh_thuc_thanh_toan' class='form-control form-control-sm'>
                            <option value='1'>Tiền mặt</option>
                            <option value='2'>Chuyển khoản</option>
                            <option value='3'>Thanh toán VNPay</option>
                        </select>
                    </div><br>
                    <input type='submit' class='btn btn-sm btn-primary mt-1' value='ĐẶT HÀNG'>
                    {{ csrf_field() }}
                </form>
            @else
                Vui lòng chọn sản phẩm cần mua
            @endif
        @else
            Vui lòng đăng nhập trước khi đặt hàng
        @endauth


    </div>


    <!-- /Order Details -->



    </x-book-layout>