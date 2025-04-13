<x-web-layout>
    <x-slot name="title">
        Check out
    </x-slot>

    <style>
        body {
            background-color: #f7f7f7;
        }

        .account-wrapper {
            display: flex;
            gap: 20px;
            padding: 30px;
        }

        .sidebar {
            width: 250px;
            background: white;
            border-radius: 10px;
            padding: 20px;
            height: fit-content;
        }

        .sidebar a {
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 10px;
            color: black;
            border-radius: 8px;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .sidebar a.active,
        .sidebar a:hover {
            background-color: #ffe5e5;
            color: #d90000;
        }

        .hot-label {
            font-size: 10px;
            color: white;
            background: red;
            padding: 2px 5px;
            border-radius: 4px;
            margin-left: 5px;
        }

        .profile-card {
            flex: 1;
            background: white;
            border-radius: 10px;
            padding: 30px;
        }

        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .form-group {
            text-align: left;
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: 600;
        }
    </style>

    <div class="account-wrapper">
        <div class="profile-card text-center">
            <form method='post' action="{{ route('ordercreate') }}" enctype="multipart/form-data"
                style="max-width: 500px; margin: 0 auto; text-align: left;">
                {{ csrf_field() }}
                <h3 class="text-center">Thông tin nhận hàng</h3>

                <input type='hidden' value='{{ $user->id }}' name='id'>

                <div class="form-group">
                    <input type='ten' class='form-control' placeholder="Họ tên người nhận" name='name'
                        value="{{ $user->name }}">
                </div>

                <div class="form-group">
                    <input type='dia_chi' class='form-control' placeholder="Địa chỉ nhận hàng" name='dia_chi'
                        value="{{ $user->dia_chi }}">
                </div>

                <div class="form-group">
                    <input type='phone' class='form-control' placeholder="Số điện thoại " name='phone'
                        value="{{ $user->phone }}">
                </div>

                <h4 class="text-center">Hình thức thanh toán</h4>
                <select name="hinh_thuc_thanh_toan" class="form-control">
                    <option value="1">Tiền mặt</option>
                    <option value="2">Chuyển khoản</option>
                    <option value="3">Thanh toán VNPay</option>
                </select><br>

                <h4 class="text-center">Sản phẩm trong đơn</h4>
                <ul>
                    @foreach($data as $item)
                        <li>{{ $item->ten_san_pham }} - SL: {{ $quantity[$item->id] }} -
                            {{ number_format($item->gia_ban) }}₫</li>
                    @endforeach
                </ul>
                <br>

                <div class="text-center">

                    <button class='btn btn-danger mt-2' type='submit'>ĐẶT HÀNG</button>
                </div>
            </form>
        </div>
    </div>


    </form>






</x-web-layout>