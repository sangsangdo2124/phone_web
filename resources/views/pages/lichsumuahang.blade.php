<x-web-layout>
    <x-slot name='title'>
        Tài khoản
    </x-slot>

    <style>
        body {
            background-color: #f7f7f7;
        }

        .sidebar {
            background: #fff;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .sidebar a {
            display: block;
            padding: 10px;
            color: #333;
            text-decoration: none;
            border-radius: 4px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #ffecec;
            color: #d90000;
            font-weight: bold;
        }

        .sidebar .label-hot,
        .sidebar .label-new {
            font-size: 10px;
            background: red;
            color: white;
            padding: 2px 5px;
            border-radius: 4px;
            margin-left: 5px;
        }

       

        .order-tabs .btn.active {
            background-color: #d90000;
            color: white;
            border-color: #d90000;
        }

        .no-orders {
            text-align: center;
            padding: 50px 20px;
        }

        .no-orders img {
            width: 150px;
            margin-bottom: 20px;
        }

        .avatar {
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .order-history-container {
            width: 100%;
            margin: 0 auto;
        }

        .order-card {
            background: #fff;
            border: 1px solid #ffd6d6; /* Viền đỏ nhạt */
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
            padding: 15px;
            margin-bottom: 20px;
        }

        .order-card:hover {
            border-color: #ffb3b3;
            box-shadow: 0 4px 10px rgba(217, 0, 0, 0.1);
        }

        .btn-card {
            margin-right: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
        }

        .order-card .btn.active {
            background-color: #d90000;
            color: white;
            border-color: #d90000;
        }


        .order-header {
            border-bottom: 1px solid #ffecec;
            padding-bottom: 10px;
            margin-bottom: 10px;
            background-color: #fff5f5;
            padding: 10px;
            border-radius: 6px;
        }

        .order-date {
            font-weight: bold;
            font-size: 14px;
            color: #d90000;
        }

        .order-status {
            color: #555;
            font-size: 13px;
        }

        .order-item {
            display: flex;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px dashed #ffdcdc;
        }

        .item-image {
            width: 70px;
            height: 70px;
            object-fit: cover;
            margin-right: 15px;
            border-radius: 6px;
            border: 1px solid #f2f2f2;
        }

        .item-details {
            flex: 1;
        }

        .item-name {
            font-weight: bold;
            font-size: 15px;
            color: #333;
        }

        .item-variant,
        .item-quantity {
            font-size: 13px;
            color: #777;
        }

        .item-price {
            font-weight: bold;
            color: #d90000;
        }

        .order-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 10px;
        }

        .order-total {
            font-weight: bold;
            font-size: 15px;
            color: #d90000;
        }

        .order-actions .btn {
            margin-left: 10px;
            padding: 6px 15px;
            font-size: 13px;
            background-color: #d90000;
            color: white;
            border: none;
        }

        .order-actions .btn:hover {
            background-color: #b80000;
        }

        .order-tabs .btn.active {
            background-color: #d90000;
            color: white;
            border-color: #d90000;
        }
    </style>


   
<body>
        <div class="container-fluid" style="padding: 20px;">
            <div class="row">
                <div class="col-sm-3">
                    <div class="sidebar">
                        <a href="{{ route('accountpanel') }}"><span class="glyphicon glyphicon-home"></span> Trang chủ</a>
                        <a href="{{ route('lichsumuahang') }}" class="active"><span class="glyphicon glyphicon-list-alt"></span> Lịch sử mua hàng</a>
                        <a href="{{ route('taikhoan') }}"><span class="glyphicon glyphicon-user"></span> Tài khoản của bạn</a>
                    </div>
                </div>

                <div class="col-sm-9">
                    <div class="content">
                        <div class="media">
                            <div class="media-left">
                                <img class="avatar" alt="Avatar"
                                    src="{{ $user->profile_photo_path ? asset('storage/profile/' . $user->profile_photo_path) : asset('img/default-avatar.jpg') }}"
                                    width="70">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">{{ $user->name }}</h4>
                                <p>{{ $user->phone }}</p>
                            </div>
                        </div>

                        <br>

                        <!-- Bộ lọc trạng thái đơn hàng -->
                        <div class="order-tabs">
                            <div class="order-card">
                                <button class="btn btn-default filter-btn active" data-filter="all">Tất cả</button>
                                <button class="btn btn-default filter-btn" data-filter="1">Đang vận chuyển</button>
                                <button class="btn btn-default filter-btn" data-filter="0">Đã giao hàng</button>
                            </div>
                        </div>

                        <!-- Danh sách đơn hàng -->
                        <div class="order-history-container">
                            @if ($don_hang->isEmpty())
                                <div class="no-orders">
                                    <img src="{{ asset('img/gio_hang_trong.png') }}" alt="empty">
                                    <p>Không có đơn hàng nào thỏa mãn!</p>
                                </div>
                            @else
                                @foreach ($don_hang as $order)
                                    <div class="order-card" data-status="{{ $order->tinh_trang }}">
                                        <div class="order-header">
                                            <div class="order-date">
                                                @if ($order->tinh_trang == 1)
                                                    🕒 {{ \Carbon\Carbon::parse($order->ngay_dat_hang)->format('d/m/Y') }} - Đang vận chuyển
                                                @else
                                                    <i class="fa fa-truck" style="margin-right:5px; color:#d90000;"></i>
                                                    {{ \Carbon\Carbon::parse($order->ngay_dat_hang)->addDays(3)->format('d/m/Y') }} - Đã giao
                                                @endif
                                            </div>
                                            <div class="order-status">
                                                {{ $order->tinh_trang == 1 ? 'Đơn hàng đang được vận chuyển.' : 'Kiện hàng của bạn đã được giao.' }}
                                            </div>
                                        </div>

                                        @foreach ($order->items as $item)
                                            <div class="order-item">
                                                <img src="{{ asset('img/' . $item->hinh_anh_chinh) }}" alt="product"
                                                    class="item-image">
                                                <div class="item-details">
                                                    <div class="item-name">{{ $item->ten_san_pham }}</div>
                                                    <div class="item-quantity">x{{ $item->so_luong }}</div>
                                                </div>
                                                <div class="item-price">{{ number_format($item->don_gia, 0, ',', '.') }}đ</div>
                                            </div>
                                        @endforeach

                                        <div class="order-footer">
                                            <div class="order-total">
                                                Tổng: {{ number_format($order->tong_tien, 0, ',', '.') }}đ
                                            </div>
                                            <div class="order-actions">
                                                <button class="btn btn-outline-danger">Viết đánh giá</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- JavaScript lọc theo trạng thái --}}
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const filterButtons = document.querySelectorAll('.filter-btn');
                const orders = document.querySelectorAll('.order-card[data-status]');

                filterButtons.forEach(btn => {
                    btn.addEventListener('click', function () {
                        filterButtons.forEach(b => b.classList.remove('active'));
                        this.classList.add('active');

                        const filter = this.getAttribute('data-filter');

                        orders.forEach(order => {
                            const status = order.getAttribute('data-status');
                            order.style.display = (filter === 'all' || filter === status) ? 'block' : 'none';
                        });
                    });
                });
            });
        </script>
    </body>
</x-web-layout>