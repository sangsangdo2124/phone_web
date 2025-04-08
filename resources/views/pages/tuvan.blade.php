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
		<center>
		<div class="navbar navbar-expand-lg p-4" style="background-color: #d7deec !important;  display: flex; justify-content: center; align-items: center;">
                    <div style="display: flex; gap: 20px; align-items: center; text-align: center">
                        <img src="{{ asset('img/header_1.jpg') }}" style="width: 240px; height: auto; object-fit: cover;">
                        <img src="{{ asset('img/header_2.jpg') }}" style="width: 245px; height: auto; object-fit: cover;">
                        <img src="{{ asset('img/header_3.jpg') }}" style="width: 220px; height: auto; object-fit: cover;">
                        <img src="{{ asset('img/header_4.jpg') }}" style="width: 250px; height: auto; object-fit: cover;">
                    </div>
            </div>
		<div id="site-wrapper" class="container align-center clearfix">
		<div id="contact-us-main" class="clearfix">
  			<div class="contact-content-wrapper">
		<div id="site-body">
			<div class="clear"></div>
			<div id="contact-us-main" class="clearfix">
				<div class="contact-form relative">
					<div class="preloader">
						<div class="loaderweb"></div>
					</div>
					<form method="post" id="contact-form">
						<h1>Ego Mobile Xin Hân Hạnh Được Hỗ Trợ Quý Khách</h1>
						<div class="the-form-wrapper">
							<div class="topic-filter-wrapper clearfix">
								<label for="topic-filter">Quý khách đang quan tâm về: </label>
								<strong class="required">*</strong>
								<select id="topic-filter" class="topic-filter" name="TopicId" required="" oninput="setCustomValidity('')" oninvalid="setCustomValidity('Vui lòng chọn chủ đề')">
									<option value="" disabled="" selected="">Chọn chủ đề</option>
												<option value="1">Tư vấn</option>
												<option value="2">Khiếu nại - Phản ánh</option>
												<option value="3">Hợp tác với Ego Mobile</option>
												<option value="4">Góp ý cải tiến</option>
								</select>
							</div>
							<div class="row-wrapper clearfix">
								<div class="label-wrapper">
									<label for="title">Tiêu đề</label>
									<strong class="required">*</strong>
								</div>
								<div class="input-wrapper">
										<input required="" oninvalid="this.setCustomValidity('Vui lòng nhập tiêu đề!')" oninput="this.setCustomValidity('')" name="Title" type="text">
								</div>
							</div>
							<div class="row-wrapper clearfix">
								<div class="label-wrapper">
									<label for="message">Nội dung</label>
									<strong class="required">*</strong>
								</div>
								<div class="input-wrapper">
									<textarea name="ContactInfo.Message" required="" oninvalid="this.setCustomValidity('Vui lòng nhập nội dung!')" oninput="this.setCustomValidity('')" placeholder="Xin quý khách vui lòng mô tả chi tiết"></textarea>
								</div>
							</div>
							<div class="row-wrapper clearfix">
								<div class="label-wrapper">
									<label for="fullname">Họ và tên</label>
									<strong class="required">*</strong>
								</div>
								<div class="input-wrapper">
									<input name="ContactInfo.Name" required="" oninvalid="this.setCustomValidity('Vui lòng nhập họ tên!')" oninput="this.setCustomValidity('')" type="text">
								</div>
							</div>
							<div class="row-wrapper clearfix">
								<div class="label-wrapper">
									<label for="email">Địa chỉ email</label>
									<strong class="required">*</strong>
								</div>
								<div class="input-wrapper">
									<input name="ContactInfo.Email" required="" oninvalid="this.setCustomValidity('Email không hợp lệ!')" oninput="this.setCustomValidity('')" type="email">
								</div>
							</div>
							<div class="row-wrapper clearfix">
								<div class="label-wrapper">
									<label for="tel">Số điện thoại</label>
									<strong class="required">*</strong>
								</div>
								<div class="input-wrapper">
									<input name="ContactInfo.Mobile" required="" pattern="84|0[3|5|7|8|9][0-9]{8}" oninvalid="this.setCustomValidity('Số điện thoại không hợp lệ!')" oninput="this.setCustomValidity('')" type="tel" maxlength="10">
								</div>
							</div>
						</div>
						<div class="submit-wrapper">
							<input name="submit" type="hidden">
							<button class="submit submitForm" type="button" style="display: none;">Gửi Liên Hệ</button><div class="dcap"><button class="submit submitForm" type="button">Gửi Liên Hệ</button></div>
						</div>
						
						<div><input id="g-recaptcha-response_captcha_1307678082" name="g-recaptcha-response" type="hidden"><script>
					var onloadCallbackcaptcha_1307678082 = function() {
						var form = $('input[id="g-recaptcha-response_captcha_1307678082"]').closest('form');
						var btn = $(form.find('.submit')[0]);
						btn.after("<div class='dcap'></div>");

						var loaded = false;
						var isBusy = false;
						btn.clone(false,false).unbind('click').on('click', function (e) {

								if (!isBusy) {
									isBusy = true;
									grecaptcha.execute('6LdjGgcaAAAAAJQ8ucRoMhdyKXlUxGdrEycRnACr', { 'action': 'ContactUs' }).then(function(token) {
										$('#g-recaptcha-response_captcha_1307678082', form).val(token);
										loaded = true;
										isBusy = false;
										btn.click();
									});
								}
								return loaded;
						})
						.prependTo(form.find('.dcap')[0]).each(function(){
							btn.hide();
						});
						
					}
				</script><script async="" defer="" src="https://www.google.com/recaptcha/api.js?onload=onloadCallbackcaptcha_1307678082&amp;render=6LdjGgcaAAAAAJQ8ucRoMhdyKXlUxGdrEycRnACr&amp;hl=vi"></script><style>.grecaptcha-badge {display: none!important;}</style></div>
					<input name="AntiforgeryFieldname" type="hidden" value="CfDJ8FymfYDrDodOjXx600d-ywJobwPBwQB38L8GXpHl2JKdFwoCS3tbagnlmi-fzHcDoV4WgAAW-SQ6uYb7d6LDla78SUuc1jgUbFAMv3wttBQOdgoDA0nQsQQ97HQaWw8nFjEGlcDltkbEO56e8l9Msw4"></form>
				</div>

				<!-- THÔNG TIN LIÊN HỆ -->
				<div class="contact-info">
					<h3>THÔNG TIN LIÊN HỆ KHÁC</h3>
					<div class="quote">Tìm siêu thị Ego Mobile? Xin mời ghé thăm trang <a href="#">Tìm siêu thị</a> để xem bản đồ và địa chỉ các siêu thị trên toàn quốc.</div>

					<div class="content">
						<p>Báo chí, hợp tác: liên hệ <a href="mailto:egomobile12@gmail.com">egomobile12@gmail.com</a></p>
						<p>Tổng đài tư vấn, hỗ trợ khách hàng (8:00 - 21:30): <span class="tel">1900 232 460</span></p>
						<p>Tổng đài khiếu nại (8:00 - 21:30): <span class="tel">1800.1062</span></p>
						<p>Email: <a href="mailto:egomobile12@gmail.com">egomobile12@gmail.com</a></p>
					</div>

					<div class="company-address-wrapper">
						<div class="company-name">CÔNG TY CỔ PHẦN EGO MOBILE</div>
							<div class="company-address">
								<p>56 Hoàng Diệu 2, P. Linh Chiểu, TP. Thủ Đức , TP. Hồ Chí Minh</p>
								<p>Điện thoại: <span class="tel">(12) 0000 1100</span></p>
								<p>Fax: <span class="tel">028 33 100 100</span></p>
							</div>
						</div>

						<div class="map-wrapper">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.406154891504!2d106.75937667451811!3d10.856681057709311!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175279bd5046e39%3A0x4671fb1dd244b78!2zNTYgxJAuIEhvw6BuZyBEaeG7h3UgMiwgTGluaCBDaGnhu4N1LCBUaOG7pyDEkOG7qWMsIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1743995201443!5m2!1svi!2s" width="100%" height="300" style="border:0;" allowfullscreen loading="lazy"></iframe>
						</div>

					</div>

					<div class="clear_20"></div>
						<div class="hide">
							<div class="wrap_comment" title="Bình luận sản phẩm" id="comment" cmtcategoryid="16" siteid="1" detailid="1010" cateid="" urlpage="" pagesize="5" data-js="https://cdn.tgdd.vn/comment/Scripts/CommentDesktop2022.min.v20221011002.js" data-ismobile="False" data-jsovrcmt="https://cdn.tgdd.vn/mwgcart/mwgcore/js/Comment/overrideScript.min.v202206290200.js"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</center>
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

		.contact-content-wrapper {
  display: flex;
  flex-wrap: wrap;
  gap: 40px;
  margin-top: 20px;
}

.contact-form,
.contact-info {
  flex: 1 1 48%;
  background: #fff;
  padding: 20px;
  box-sizing: border-box;
  border: 1px solid #e0e0e0;
  border-radius: 4px;
}

.contact-form h1 {
  font-size: 20px;
  color: #222;
  border-left: 4px solid #fcb800;
  padding-left: 10px;
  margin-bottom: 20px;
  text-transform: uppercase;
}

.contact-info h3 {
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 10px;
}

.contact-info .quote {
  font-style: italic;
  margin-bottom: 10px;
  color: #666;
}

.company-name {
  font-weight: bold;
  margin-top: 15px;
}

.tel {
  color: #f60;
  font-weight: bold;
}

.map-wrapper iframe {
  width: 100%;
  height: 250px;
  margin-top: 15px;
  border-radius: 4px;
}

@media (max-width: 768px) {
  .contact-form,
  .contact-info {
    flex: 1 1 100%;
  }
}

	</style>