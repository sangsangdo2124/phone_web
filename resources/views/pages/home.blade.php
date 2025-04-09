<x-web-layout>
	<x-slot name='title'>
		Trang chủ
	</x-slot>

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
															<button class="quick-view" data-id="{{ $product->id }}"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
															<div id="quick-view-container"></div>

														</div>
													</div>

													<div class="add-to-cart d-flex flex-column gap-2" style="min-height: 90px;">
														<form method="POST" action="{{ route('Muangay') }}">
															@csrf
															<input type="hidden" name="id" value="{{ $product->id }}">
															<button type="submit" class="add-to-cart-btn add-product">
																<i class="fa fa-bolt"></i> Mua ngay
															</button>
														</form>
														<button class='add-to-cart-btn add-product' sp_id="{{$product->id}}"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
													</div>
												</div>
										@endforeach
									</div>
									<div id="slick-nav-{{ $collection->id }}" class="products-slick-nav"></div>

									{{--Nút Xem tất cả sản phẩm --}}
									<div class="text-center mt-6">
										<a href="{{ route('allproducts') }}" class="btn btn-outline-primary">Xem tất cả sản phẩm</a>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>


			</div>
		</div>
	</div>
</x-web-layout>