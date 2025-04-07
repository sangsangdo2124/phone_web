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

        .order-tabs .btn {
            margin-right: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
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
    </style>
    </head>

    <body>
        <div class="container-fluid" style="padding: 20px;">
            <div class="row">
                <div class="col-sm-3">
                    <div class="sidebar">
                        <a href="{{ route('accountpanel') }}"><span class="glyphicon glyphicon-home"></span> Trang
                            chủ</a>
                        <a href="{{ route('lichsumuahang') }}"><span class="glyphicon glyphicon-list-alt"></span> Lịch sử mua hàng</a>
                        <a href="{{ route('taikhoan') }}"><span class="glyphicon glyphicon-user"></span> Tài khoản của bạn</a>

                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="content">

                        <div class="media">
                            <div class="media-left">
                                <img class="avatar" alt="Avatar" src="{{ asset('storage/profile/' . $user->profile_photo_path) }}" width="60">
                            </div>
                            <div class="media-body">


                                <h4 class="media-heading">{{ $user->name }}</h4>
                                <p>{{ $user->phone }}</p>

                            </div>
                        </div>

                        <br>
                        <!-- Main content -->
                        <div class="col-sm-9">
                            <div class="order-tabs">
                                <button class="btn btn-default active">Tất cả</button>                                
                                <button class="btn btn-default">Đang vận chuyển</button>
                                <button class="btn btn-default">Đã giao hàng</button>
                                
                            </div>

                            <div class="no-orders">
                                <img src="{{ asset('images/empty-order.png') }}" alt="empty">
                                <p>Không có đơn hàng nào thỏa mãn!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </x-book-layout>