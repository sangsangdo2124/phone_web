<x-web-layout>
    <x-slot name='title'>
        Tài khoản
    </x-slot>
    <style>
        body {
            background-color: #f7f7f7;
        }
        .sidebar {
            background: white;
            border-radius: 10px;
            padding: 20px;
            height: 100%;
        }
        .sidebar a {
            text-decoration: none;
            display: block;
            padding: 10px;
            color: black;
            border-radius: 8px;
            margin-bottom: 5px;
        }
        .sidebar a.active, .sidebar a:hover {
            background-color: #ffdede;
            color: #d90000;
            font-weight: bold;
        }
        .hot-label {
            font-size: 10px;
            color: white;
            background: red;
            padding: 2px 5px;
            border-radius: 4px;
            margin-left: 5px;
        }
        .content {
            background: white;
            border-radius: 10px;
            padding: 20px;
        }
        .info-box {
            background-color: #eaf6ff;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        .info-box .btn {
            float: right;
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
                    <a href="{{ route ('accountpanel') }}"><span class="glyphicon glyphicon-home"></span> Trang chủ</a>
                    <a href="{{ route('lichsumuahang') }}"><span class="glyphicon glyphicon-list-alt"></span> Lịch sử mua hàng</a>
                    <a href="{{ route('taikhoan') }}"><span class="glyphicon glyphicon-user"></span> Tài khoản của bạn</a>
                    
                </div>
            </div>
            <div class="col-sm-9">

            <div class="media">
                        <div class="media-left">
                           <img class="avatar" alt="Avatar" src="{{ asset('storage/profile/' . $user->profile_photo_path) }}"width ="70">
                        </div>
                        <div class="media-body">
                        

                            <h4 class="media-heading">{{ $user->name }}</h4>
                            <p>{{ $user->phone }}</p>
                            
                        </div>
                    </div>
                <div class="content">
                   

                    <div class="row text-center" style="margin: 20px 0;">
                        <div class="col-xs-6">
                            <h4>{{ $orderCount }}</h4>
                            <p>Đơn hàng</p>
                        </div>
                        <div class="col-xs-6">
                            <h4>{{ number_format($totalAmount, 0, ',', '.') }}đ</h4>
                            <p>Tổng tiền tích luỹ từ 01/01/2024</p>
                        </div>
                    </div>

                  

                </div>
            </div>
        </div>
    </div>
    </x-book-layout>