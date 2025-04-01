<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EGO MOBILE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!--thư viện dùng cái icon -->
    <style>
        
        .text-white{
            text-decoration: none; /*tắt gạch chân ở các thẻ text white*/
        }
        .navbar {
            background-color: /*#dc3545*/  #f72c0f;
            color: white;
            height: 20px;
        }
        .search-bar {
            max-width: 300px;
        }

        .icon-large {
            color: white; /* Màu trắng */
        }

        .btn-light {
            background-color: #ff6666; /* Màu đỏ nhạt */
            color: white;
            border-radius: 10px;
            font-weight: bold;
            padding: 10px;
        }

        .btn-light:hover {
        background-color: #ff4444; /* Màu đậm hơn khi hover */
        }

        /* Định dạng menu danh mục */
        .category-menu {
            display: flex;
            gap: 20px;
            padding: 0px 20px;
        }
        .category-menu li {
            list-style: none;
        }
        .category-menu a {
            color: white;
            font-weight: bold;
            text-decoration: none;
            margin-right: 15px;
        }
        
    /*CSS cho footer*/
        footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .footer-links {
            display: flex;
            justify-content: space-around;
            width: 100%;
            max-width: 1200px;
            margin-bottom: 20px;
        }

        .footer-links div {
            flex: 1;
            margin: 0 10px;
        }

        .footer-links a {
            color: #fff;
            text-decoration: none;
            display: block;
            margin: 5px 0;
			transition: color 0.3s;
        }

		.footer-links a:hover {
            color: #f39c12; /* Màu khi di chuột qua */
        }
		.footer-links a:active {
            color: #d35400; /* Màu khi nhấn vào */
        }
        .subscribe {
            text-align: center;
        }

        .subscribe input[type="email"] {
            padding: 10px 15px;
            width: 200px;
			border: none;
			margin-bottom: 20px;
        }

        .subscribe button {
            padding: 10px 15px;
            background-color:rgb(243, 93, 18);
            border: none;
            color: #fff;
			height: 40px;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg p-3" style="background-color: #f72c0f !important">
            <div class="container-fluid">
                <span class="me-auto">Chúc buổi sáng vui vẻ, Bạn cần thông tin gì hôm nay?</span>
                <span>Email hỗ trợ: <a href="mailto:nhom5@gmail.com" class="text-white">abc999@gmail.com</a></span>
                <a href="#" class="text-white ms-3">Đăng nhập / Đăng ký</a>
            </div>
        </nav>
            <!--HEADER-->
            <div class="container-fluid bg-danger text-white py-3 text-center" style="
            background-color: #f72c0f !important;!i;!;">
                <div class="container-fluid">
                    <div class="row align-items-center">
                    
                        <!-- Nhóm Logo & Tiêu đề -->
                        <div class="col-md-3 text-center">
                            <h1 class="fw-bold">EGO MOBILE</h1>
                            <p>Siêu thị điện thoại số 1 Việt Nam</p>
                        </div>

                        <!--Thanh tìm kiếm-->
                        <div class="col-md-6 d-flex justify-content-center">
                            <input type="text" class="form-control search-bar" placeholder="Bạn cần tìm gì?">
                            <button class="btn btn-light ms-2">Tìm kiếm</button>
                        </div>

                        <!-- Nhóm nút đặt hàng, hệ thống, giỏ hàng-->
                        <div class="col-md-3 d-flex justify-content-center align-items-center">
                            <button class="btn btn-light me-2">
                                    <span class="material-icons">call</span>
                            </button>

                            <button class="btn btn-light me-2">
                                <span class="material-icons">store</span><br>
                            </button> 

                            <button class="btn btn-light">
                                <span class="material-icons">shopping_cart</span><br>
                            </button>
                        </div>



                    </div>
                </div>
            </div>


            <!-- Danh mục sản phẩm -->
            <div class="container-fluid bg-danger text-white py-2" style="
                            background-color: #f72c0f !important;!i;!;">
                <ul class="navbar-nav w-100 d-flex flex-row justify-content-start category-menu">
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="#">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">IPhone</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Samsung</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Xiaomi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Oppo</a>
                    </li>
                </ul>
            </div>
    </header>

    <!--dùng x-slot-->
    <main style="max-width: 1200px; width: 90%; margin: 20px auto;">
        <div class='row'>
            <div class='col-12'>
                {{$slot}}
            </div>
        </div>
    </main>



    <footer>
        <div class="footer-links">
            <div>
                <h3>VỀ CHÚNG TÔI </h3>
                <a href="#">Lịch sử hình thành</a>
                <a href="#">Đội ngũ</a>
                <a href="#">Thương hiệu</a>
            </div>
            <div>
                <h3>CHÍNH SÁCH BÁN HÀNG</h3>
                <a href="#">Chính sách đổi trả</a>
                <a href="#">Chính sách bảo hành</a>
                <a href="#">Thương hiệu</a>
            </div>
            <div>
                <h3>THEO DÕI CHÚNG TÔI</h3>
                <a href="#">Theo dõi trên Fanpage</a>
                <a href="#">Theo dõi trên Twitter</a>
                <a href="#">Theo dõi trên Instagram</a>
            </div>
        </div>
        <div class="subscribe">
            <h3 style="text-align: left;">Nhận tin khuyến mãi</h3>
            <input type="email" placeholder="Nhập email của bạn">
            <button>Đăng ký</button>
        </div>
        <p>Copyright © 2025 NHÓM 9 MÃ NGUỒN MỞ</p>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> <!--javascripts của bootstrap-->
</body>
</html>
