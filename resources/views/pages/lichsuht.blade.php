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
								<li><a href="#">Lịch sử mua hàng</a></li>
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
							<a href="#" class="logo">
								<img src="{{ asset('img/logo.png') }}" alt="Logo">
							</a>
						</div>
					</div>
					<!-- /LOGO -->

					<!-- SEARCH BAR -->
					<div class="col-md-6">
						<div class="header-search">
							<form>
								<select class="input-select">
									<option value="0">All Categories</option>
									<option value="1">Category 01</option>
									<option value="2">Category 02</option>
								</select>
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
							

							<div class="dropdown" >
								<a href="{{ route('order') }}">
									<i class="fa fa-shopping-cart"></i>
									<span>Giỏ hàng</span>
									<div class="qty" id='cart-number-product'>
										@if (session('cart'))
											{{ count(session('cart')) }}
										@else
											0
										@endif
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
					<li class="active"><a href="/">Trang chủ</a></li>
					<li><a href="#">Sản phẩm</a></li>
					<li><a href="#">Thương hiệu</a></li>
					<li><a href="#">Phụ kiện công nghệ</a></li>
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
	<!--Main content-->
    <main style="max-width: 1200px; width: 90%; margin: 20px auto;">
        <div style="text-align: center;">
            <img src="{{ asset('img/gioithieu_1.jpg') }}">
        </div>
        <h3 style="text-align:justify">
            <span style="font-family:arial,helvetica,sans-serif">
                <span style="color:#FF8C00">
                    <strong>
                        <span style="font-size:16px">1. LỊCH SỬ HÌNH THÀNH VÀ PHÁT TRIỂN</span>
                    </strong>
                </span>
            </span>
        </h3>
        <p style="text-align:justify">
            <span style="font-family:arial,helvetica,sans-serif">
                <span style="font-size:16px">- Khởi nghiệp chưa bao giờ là con đường chỉ toàn màu hồng. Song nó lại là con đường đáng để chúng ta dấn thân và mạo hiểm. Bởi vì trên con đường này, chúng ta nhìn thấy đam mê và khát vọng của bản thân - và dám sống thật với ước mơ của chính mình.<br>
                                            - Chặng đường đó luôn ẩn chứa nhiều khó khăn nhưng cũng là một hành trình rất hữu ích vì nó mang đến nhiều trải nghiệm và bài học quý giá.<br>
                                            - Sau hơn 3 tháng hoạt động, tuy phải trải qua những thử thách nhưng với sự Tin Tưởng và Ủng Hộ Nhiệt Tình của Quý Khách Hàng - Tập Thể Ego Mobile đã đạt được những mục tiêu và thành tựu nhất định.&nbsp;
                </span>
            </span>
        </p>
        <ul>
            <li style="text-align:justify"><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:16px">30/12/2024: Nguyên là cửa hàng Ego Mobile do chủ tư nhân thành lập</span></span></li>
            <li style="text-align:justify"><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:16px">15/01/2025: Ra mắt trang web TMĐT www.EgoMobile.com.</span></span></li>
            <li style="text-align:justify"><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:16px">Từ năm 2024 - nay: Thay đổi nhận diện thương hiệu mới, phát triển toàn diện các sản phẩm điện tử nhằm mang lại trải nghiệm tốt nhất cho khách hàng.</span></span></li>
            <li style="text-align:justify"><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:16px">Tóm lại, Ego Mobile phát triển thành siêu thị điẹn thoại chính hãng hàng đầu Việt Nam nhằm đáp ứng nhu cầu ngày một tăng của Khách hàng cũng như mở rộng mặt hàng kinh doanh bán lẻ trên cả nước.</span></span></li>
        </ul>
        <h3 style="text-align:justify">
            <span style="font-family:arial,helvetica,sans-serif">
                <span style="color:#FF8C00">
                    <strong>
                        <span style="font-size:16px">2. TẦM NHÌN - SỨ MỆNH - GIÁ TRỊ CỐT LÕI</span>
                    </strong>
                </span>
            </span>
        </h3>
        <h4 style="text-align:justify">
            <span style="font-family:arial,helvetica,sans-serif">
                <span style="color:#FF8C00">
                    <strong>
                        <span style="font-size:16px">2.1. Tầm Nhìn</span>
                    </strong>
                </span>
            </span>
        </h4>
        <p style="text-align:justify">
            <span style="font-family:arial,helvetica,sans-serif">
                <span style="font-size:16px">- Trở thành nhà bán lẻ mặt hàng công nghệ điện tử chính hãng có chất lượng và dịch vụ <strong>hàng Đầu tại khu vực Thành Phố Hồ Chí Minh</strong> đến năm 2025.<br>
                                            - Phát triển thương hiệu ngày càng lớn mạnh bằng cách tập trung<strong> “Nâng Cấp Dịch Vụ Khách Hàng”</strong> để mang đến sự trải nghiệm một cách toàn diện nhất
                </span>
            </span>
        </p>
        <h4 style="text-align:justify">
            <span style="font-family:arial,helvetica,sans-serif">
                <span style="color:#FF8C00">
                    <strong>
                        <span style="font-size:16px">2.2. Sứ Mệnh</span>
                    </strong>
                </span>
            </span>
        </h4>
        <p style="text-align:justify">
            <span style="font-family:arial,helvetica,sans-serif">
                <span style="font-size:16px">- Đối với Khách Hàng: Cung cấp các sản phẩm - dịch vụ đẳng cấp chất lượng đảm bảo, giá cạnh tranh, chế độ bảo hành uy tín.<br>
                                            - Đối với Đối Tác: Đề cao tinh thần, trách nhiệm hợp tác cùng phát triển; cam kết trở thành <strong>“Người đồng hành số 1”</strong> của các đối tác, luôn gia tăng các giá trị đầu tư hấp dẫn và lâu dài.<br>
                                            - Đối với Nhân Viên: Xây dựng môi trường làm việc chuyên nghiệp, thân thiện, năng động, sáng tạo và nhân văn; tạo điều kiện thu nhập cao và cơ hội phát triển toàn diện cho tất cả nhân viên.<br>
                                            - Đối với Xã Hội: Hài hòa giữa lợi ích doanh nghiệp với lợi ích xã hội; tham gia đóng góp tích cực vào các hoạt động hướng về cộng đồng, thể hiện tinh thần trách nhiệm công dân và niềm tự hào dân tộc.
                </span>
            </span>
        </p>
        <h4 style="text-align:justify">
            <span style="font-family:arial,helvetica,sans-serif">
                <span style="color:#FF8C00">
                    <strong>
                        <span style="font-size:16px">2.3. Giá Trị Cốt Lõi</span>
                    </strong>
                </span>
            </span>
        </h4>
        <p style="text-align:center">
            <img src="{{ asset('img/gioithieu_2.jpg') }}">
        </p>
        <p style="text-align:justify">
            <span style="font-family:arial,helvetica,sans-serif">
                <span style="font-size:16px">- Con người, sản phẩm và dịch vụ là 3 yếu tố luôn tồn tại song song để phát triển xã hội. Chính vì thế, Ego luôn tập trung vào:<br>
                                    1. <strong>Con người:</strong> Đội ngũ nhân viên Tận Tình - Thân Thiện - Sẻ Chia, cùng đóng góp để cùng công ty phát triển ngày một lớn mạnh hơn.<br>
                                    2. <strong>Sản phẩm:</strong> Tất cả các loại sản phẩm luôn luôn đạt đến tình trạng tốt nhất khi giao đến tay khách hàng.<br>
                                    3. <strong> Dịch vụ: </strong>Sự hài lòng cao nhất của khách hàng luôn được đặt lên hàng đầu, trên cả lợi ích của công ty.
                </span>
            </span>
        </p>
    </main>

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

    <!--Modal Thông tin liên hệ -->
		<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #d10024; color: white;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span style="color:white;" aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="contactModalLabel">Thông tin tư vấn</h4>
                    </div>
                    <div class="modal-body">
                        <p><strong>Điện thoại:</strong> +12-0000-1100</p>
                        <p><strong>Email:</strong> egomobile12@gmail.com</p>
                        <p><strong>Địa chỉ:</strong> 56 Hoàng Diệu 2</p>
                        <p><strong>Thời gian hỗ trợ:</strong> 8:00 - 17:00 (Thứ 2 đến Thứ 7)</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>

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
								<li><a href="{{ route('thuonghieu') }}">Giới thiệu </a></li>
								<li><a href="{{ route('csdoitra_baohanh') }}">Chính sách</a></li>
								<li><a href="{{ route('lichsuht') }}">Lịch sử hình thành</a></li>
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
								<li><a href="{{ route('tuvan') }}">Tư vấn</a></li>
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
			font-size: 18px;
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