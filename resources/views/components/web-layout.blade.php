<!DOCTYPE html>
<html lang="vi">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>{{$title}}</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Inter:400,500,700" rel="stylesheet"> <!--font inter-->

	<!-- Bootstrap -->
	<!-- CSS Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- JavaScript Bootstrap 3.3.7 (jQuery cần được thêm trước)-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- Slick -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">

	<!-- nouislider-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.1/nouislider.min.css">

	<!-- Font Awesome Icon-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Custom CSS stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- TOP HEADER -->
		<div id="top-header">
			<div class="container">
				<ul class="header-links pull-left">
					<li><a href="#"><i class="fa fa-phone"></i> +12-0000-1100</a></li>
					<li><a href="#"><i class="fa fa-envelope-o"></i> egomobile12@gmail.com</a></li>
					<li><a href="#"><i class="fa fa-map-marker"></i> 56 Hoàng Diệu 2</a></li>
				</ul>

				<ul class="header-links pull-right">
					<!-- Dropdown chọn ngôn ngữ -->
					<li class="list-inline-item dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-globe"></i> <span id="selected-language">Tiếng Việt</span>
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item language-option" href="#" data-lang="en">🇺🇸 English</a><br>
							<a class="dropdown-item language-option" href="#" data-lang="vi">🇻🇳 Tiếng Việt</a>
						</div>
					</li>

					<!-- Kiểm tra trạng thái đăng nhập -->
					@auth
						<li class="list-inline-item dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-user-o"></i> {{ Auth::user()->name }}
							</a>
							<ul class="dropdown-menu">
								<li><a href="{{ route('accountpanel') }}">Tài khoản</a></li>
								<li>
									<form method="POST" action="{{ route('logout') }}">
										@csrf
										<a class="dropdown-item" href="#"
											onclick="event.preventDefault(); this.closest('form').submit();">Đăng xuất</a>
									</form>
								</li>
							</ul>
						</li>
					@else
						<li><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Đăng nhập</a></li>
						<li><a href="{{ route('register') }}"><i class="fa fa-user-plus"></i> Đăng ký</a></li>
					@endauth
				</ul>


			</div>
		</div>
		<!-- /TOP HEADER -->

		<!-- MAIN HEADER -->
		<div id="header">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- LOGO -->
					<div class="col-md-3">
						<div class="header-logo">
							<a href="{{ url('/') }}" class="logo">
								<img src="{{ asset('img/logo.png') }}" alt="Logo">
							</a>
						</div>
					</div>
					<!-- /LOGO -->

					<!-- SEARCH BAR -->
					<div class="col-md-6">
						<div class="header-search">
							<form>
								<input class="input" placeholder="Bạn cần tìm gì?">
								<button class="search-btn">Tìm kiếm</button>
							</form>
						</div>
					</div>
					<!-- /SEARCH BAR -->

					<!-- ACCOUNT -->
					<div class="col-md-3 clearfix">
						<div class="header-ctn">
							<!--Danh sách yêu thích -->
							<div>
								<a href="#">
									<i class="fa fa-heart-o"></i>
									<span>Yêu thích</span>
									<div class="qty">0<!--code để lấy số lượng--></div>
								</a>
							</div>
							<!-- /Danh sách yêu thích -->

							<!-- Cart -->


							<div class="dropdown">
								<a href="{{ route('order') }}">
									<i class="fa fa-shopping-cart"></i>
									<span>Giỏ hàng</span>
									<div class="qty" id='cart-number-product'>
				@php $cartCount = 0;
					if (Auth::check()) {
						$cartCount = DB::table('cart_items')->where('user_id', Auth::id())->count();
					} elseif (session()->has('cart')) {
						$cartCount = count(session('cart'));
					}
				@endphp

										<span id="cart-count">{{ $cartCount }}</span>
									</div>
								</a>
							</div>
							<!-- /Cart -->

							<!-- Menu Toogle -->
							<div class="menu-toggle">
								<a href="#">
									<i class="fa fa-bars"></i>
									<span>Menu</span>
								</a>
							</div>
							<!-- /Menu Toogle -->
						</div>
					</div>
					<!-- /ACCOUNT -->
				</div>
				<!-- row -->
			</div>
			<!-- container -->
		</div>
		<!-- /MAIN HEADER -->
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<nav id="navigation">
		<!-- container -->
		<div class="container">
			<!-- responsive-nav -->
			<div id="responsive-nav">
				
        <!-- NAV -->
				<ul class="main-nav nav navbar-nav">
					<li class="active"><a href="{{ url('/') }}">Trang chủ</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Sản phẩm <i class="fa fa-caret-down"></i></a>
						<ul class="dropdown-menu">
							@foreach($categories as $category)
								<li>
									<a href="{{ route('store.index', ['category' => $category->id]) }}">
										{{ $category->ten_loai_san_pham }}
									</a>
                				</li>
            				@endforeach
        				</ul>
    				</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Thương hiệu <i class="fa fa-caret-down"></i></a>
						<ul class="dropdown-menu">
							@foreach($brands as $brand)
								<li>
									<a href="{{ route('store.index', ['brand' => $brand->id]) }}">
										{{ $brand->ten_nha_san_xuat }}
									</a>
								</li>
							@endforeach
						</ul>
					</li>
					<li><a href="{{ url('/') }}#new-products">Sản phẩm mới nhất</a></li>
				</ul>
				<!-- /NAV -->

			</div>
			<!-- /responsive-nav -->
		</div>
		<!-- /container -->
	</nav>
	<!-- /NAVIGATION -->

	<!-- BREADCRUMB -->
	<!-- /BREADCRUMB -->

	<!-- SECTION -->
	<div class="section">
		{{$slot}}
	</div>
	<!-- /SECTION -->
	
	<!-- NEWSLETTER -->
	<div id="newsletter" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="newsletter">
						<p>Đăng ký để nhận thông tin <strong>KHUYẾN MÃI</strong></p>
						<form>
							<input class="input" type="email" placeholder="Nhập email của bạn">
							<button class="newsletter-btn"><i class="fa fa-envelope"></i> Đăng ký</button>
						</form>
						<ul class="newsletter-follow">
							<li>
								<a href="#"><i class="fa fa-facebook"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-twitter"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-instagram"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-pinterest"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /NEWSLETTER -->

	<!-- FOOTER -->
	<footer id="footer">
		<!-- top footer -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Liên hệ</h3>
							<ul class="footer-links">
								<li><a href="#"><i class="fa fa-map-marker"></i>56 Hoàng Diệu 2</a></li>
								<li><a href="#"><i class="fa fa-phone"></i>+12-0000-1100</a></li>
								<li><a href="#"><i class="fa fa-envelope-o"></i>egomobile12@gmail.com</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Danh mục nổi bật</h3>
							<ul class="footer-links">
								<li><a href="#">Laptops</a></li>
								<li><a href="#">Điện thoại</a></li>
								<li><a href="#">Phụ kiện</a></li>
							</ul>
						</div>
					</div>

					<div class="clearfix visible-xs"></div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Về chúng tôi</h3>
							<ul class="footer-links">
								<li><a href="#">Giới thiệu </a></li>
								<li><a href="#">Chính sách</a></li>
								<li><a href="#">Lịch sử hình thành</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Hỗ trợ</h3>
							<ul class="footer-links">
								<li><a href="#">Tài khoản</a></li>
								<li><a href="{{ route('order') }}">Giỏ hàng </a></li>
								<li><a href="#">Danh sách yêu thích</a></li>
								<li><a href="#">Tư vấn</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /top footer -->

		<!-- bottom footer -->
		<div id="bottom-footer" class="section">
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12 text-center">
						<ul class="footer-payments">
							<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
							<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
						</ul>

						<span class="copyright">
							Copyright &copy; {{ date('Y') }} All rights reserved | <a href="{{ url('/') }}">EGO - NHÓM
								12 - PHÁT TRIỂN ỨNG DỤNG MÃ NGUỒN MỞ</a>
						</span>

					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bottom footer -->
	</footer>
	<!-- /FOOTER -->
	<!-- jQuery Plugins -->
	<!-- Nhúng các file JS từ thư mục public/js -->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/slick.min.js') }}"></script>
	<script src="{{ asset('js/nouislider.min.js') }}"></script>
	<script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
	<!---->



	<script type="text/javascript">
		$(document).ready(function () {
			// Kích hoạt dropdown khi nhấp vào
			$('.dropdown-toggle').dropdown();
		});
	</script>
	<style>
		/* Tùy chỉnh dropdown đăng nhập*/
		.dropdown-menu {
			background-color: #333;
			border: 2px solid #D10024 border-radius: 5px;
			padding: 10px 0;
			box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
		}

		/* Màu chữ và hover của item trong dropdown */
		.dropdown-menu li a {
			color: white;
			padding: 10px 20px;
			font-size: 16px;
		}

		.dropdown-menu li a:hover {
			background-color: #ff666f;
			color: white;
		}

		/* Kích thước của dropdown */
		.dropdown-toggle {
			font-size: 15px;
		}

		/* Thêm hiệu ứng cho dropdown */
		.dropdown-menu {
			transition: all 0.3s ease-in-out;
			opacity: 0;
			visibility: hidden;
		}

		.dropdown:hover .dropdown-menu {
			opacity: 1;
			visibility: visible;
		}
	</style>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const hash = window.location.hash;
        if (hash) {
            const target = document.querySelector(hash);
            if (target) {
                setTimeout(() => {
                    target.scrollIntoView({ behavior: "smooth" });
                }, 100); // Delay để chắc chắn phần tử đã render
            }
        }
    });
</script>
<script>
$(document).ready(function() {
    // Khi người dùng nhấn nút "Quick View"
    $('.quick-view').on('click', function() {
        var productId = $(this).data('id'); // Lấy id sản phẩm

        // Gửi AJAX request để lấy thông tin sản phẩm
        $.ajax({
            url: '/quick-view/' + productId, // Địa chỉ API để lấy dữ liệu sản phẩm
            method: 'GET',
            success: function(response) {
                // Hiển thị thông tin sản phẩm vào modal
                $('#quick-view-content').html(response);
                $('#quick-view-modal').show(); // Hiển thị modal
            },
            error: function() {
                alert('Không thể tải thông tin sản phẩm.');
            }
        });
    });

    // Đóng modal khi nhấn vào dấu "X"
    $('.close').on('click', function() {
        $('#quick-view-modal').hide();
    });
});
</script>
<x-quick-view-modal/>




