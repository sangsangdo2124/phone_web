<x-web-layout>
	<x-slot name='title'>
		Trang chủ
	</x-slot>

	<script>
		var isLoggedIn = {{ Auth::check() ? 'true' : 'false' }}; // true/false

		$(document).ready(function () {
			$(".add-product").click(function (e) {
				if (!isLoggedIn) {
					$('#loginRequiredModal').modal('show');
					e.preventDefault(); // Ngăn không cho tiếp tục
					return;
				}

				// Nếu có logic thêm vào giỏ hàng bằng AJAX, bạn xử lý ở đây
				let id = $(this).attr('sp_id');
				let num = 1; // Mặc định số lượng là 1 hoặc có thể cho người dùng chọn

				$.ajax({
					type: "POST",
					dataType: "json",
					url: "{{route('cartadd')}}",
					data: { "_token": "{{ csrf_token() }}", "id": id, "num": num },
					beforeSend: function () {
					},
					success: function (data) {
						$("#cart-number-product").html(data);
					},
					error: function (xhr, status, error) {
					},
					complete: function (xhr, status) {
					}
				});
			});
		});
	</script>

	<!-- HOT DEAL SECTION -->
	<div id="hot-deal" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div id="hot-deal">
						<img src="../img/banner.png" alt="Hot Deal" style="width: 100%; height: 500px;">
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /HOT DEAL SECTION -->


		<!-- SECTION COLLECTION-->
		<div class="section">
			<div class="container">
				<div class="row">
					@foreach ($collections as $item)
						<div class="col-md-4 col-xs-6">
							<div class="shop">
								<div class="shop-img">
									<img src="{{ asset('img/shop0' . $loop->iteration . '.png') }}" alt="">
								</div>
								<div class="shop-body">
									<h3>{{ $item->ten_loai_san_pham }}<br>Collection</h3>
									<a href="{{ url('/store?category=' . $item->id) }}" class="cta-btn">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
	<!--/SECTION COLLECTION -->

		<!-- SẢN PHẨM MỚI NHẤT SECTION -->
		<div class="section" id="new-products">
			<div class="container">
				<div class="row">
					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">SẢN PHẨM MỚI NHẤT</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									@foreach($collections as $index => $collection)
										<li class="{{ $index === 0 ? 'active' : '' }}">
											<a data-toggle="tab" href="#tab-{{ $collection->id }}">{{ $collection->ten_loai_san_pham }}</a>
										</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- /section title -->

				<!-- Products tab -->
				<div class="col-md-12">
					<div class="row">
						<div class="products-tabs tab-content">
							@foreach($collections as $index => $collection)
								<div id="tab-{{ $collection->id }}" class="tab-pane {{ $index === 0 ? 'active' : '' }}">
									<div class="products-slick" data-nav="#slick-nav-{{ $collection->id }}">
										@foreach($groupedProducts[$collection->id] ?? [] as $product)
											<div class="product">
												<div class="product-img">
													<img src="{{ asset('img/' . $product->hinh_anh_chinh) }}"
														alt="{{ $product->ten_san_pham}}">
													<div class="product-label">
														@if($product->discount)
															<span class="sale">-{{ $product->discount }}%</span>
														@endif
														<span class="new">NEW</span>
													</div>
												</div>
												<div class="product-body">
													<p class="product-category">{{ $collection->ten_loai_san_pham }}</p>



													<h3 class="product-name"><a
															href="{{route('products', ['id' => $product->id])}}">{{ $product->ten_san_pham }}</a>
													</h3>
													<h4 class="product-price">
														{{ number_format($product->gia_ban, 0, ',', '.') }} VND
														@if($product->old_price)
															<del class="product-old-price">{{ number_format($product->old_price, 0, ',', '.') }}
																VND</del>
														@endif
													</h4>

														<div class="product-rating">
															@for($i = 1; $i <= 5; $i++)
																<i class="fa fa-star{{ $i <= $product->rating ? '' : '-o' }}"></i>
															@endfor
														</div>
														<div class="product-btns">
															<button class="add-to-wishlist"><i class="fa fa-heart-o"></i></button>
															<button class="add-to-compare"><i class="fa fa-exchange"></i></button>
															<button class="quick-view" data-id="{{ $product->id }}"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
															<div id="quick-view-container"></div>

														</div>
													</div>

													<div class="add-to-cart d-flex flex-column gap-2" style="min-height: 90px;">
														<form method="POST" action="{{ route('Muangay') }}">
															@csrf
															<input type="hidden" name="id" value="{{ $product->id }}">
															<button type="submit" class="add-to-cart-btn add-product">Mua ngay</button>
														</form>
														<button class='add-to-cart-btn add-product' sp_id="{{$product->id}}"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</button>
													</div>
											</div>
										@endforeach
									</div>
									<div id="slick-nav-{{ $collection->id }}" class="products-slick-nav"></div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
				<!-- /Products tab -->
			</div>
		</div>
	</div>
	<!-- Modal cảnh báo -->
	<div class="modal fade" id="loginRequiredModal" tabindex="-1" role="dialog" data-backdrop="static"
		data-keyboard="false">
		<div class="modal-dialog modal-sm">
			<div class="modal-content" style="border: 2px solid #D10024;">
				<div class="modal-header" style="background-color: #D10024; color: #fff;">
					<button type="button" class="close" data-dismiss="modal" style="color: #fff;">&times;</button>
					<h4 class="modal-title" style="color: #fff;">Yêu cầu đăng nhập</h4>
				</div>
				<div class="modal-body text-center">
					<p>Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.</p>
				</div>
				<div class="modal-footer text-center" style="justify-content: center;">
					<a href="{{ route('login') }}" class="btn btn-danger"
						style="background-color: #D10024; border: none;">Đăng nhập</a>
					<a href="{{ route('register') }}" class="btn btn-outline"
						style="border: 1px solid #D10024; color: #D10024; background: #fff;">Đăng ký</a>
				</div>
			</div>
		</div>
	</div>
	<!-- /SECTION -->

</x-web-layout>