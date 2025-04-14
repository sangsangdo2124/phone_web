<x-web-layout>
    <x-slot name='title'>
        Tư vấn
    </x-slot>
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

<style>	

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

</x-web-layout>