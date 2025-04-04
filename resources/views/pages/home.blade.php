<x-web-layout>
    <x-slot name='title'>
        Điện thoại
    </x-slot>
<style>

    .product-container {
    width: 100%;
    max-width: 1200px;
    margin: 20px auto;
    text-align: center;
    
}
.product-container h1 {
    color: red;
    font-family: var(--font-base);
    font-size: 24px;
    font-weight: 700;
    line-height: normal;
    text-transform: uppercase;
    margin-top: 5px;
    padding: 0;

}
.product-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 20px;
}

.product-card {
    background: #fff;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    text-align: center;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    position: relative;
}

.product-card img {
    max-width: 100%;
    height: 300px;
    border-bottom: 1px solid #ddd;
    margin-bottom: 10px;
}

.product-card h2 {
    font-size: 18px;
    color: #333;
    margin: 10px 0;
}

.product-card p {
    font-size: 14px;
    color: #666;
}

.product-card .price {
    font-size: 16px;
    margin-top: 10px;
}

.product-card .price .discounted {
    color: #e74c3c;
    font-weight: bold;
}

.product-card .price .original {
    text-decoration: line-through;
    color: #999;
    font-size: 14px;
    margin-left: 5px;
}

.discount-label {
    position: absolute;
    top: 10px;
    left: 10px;
    background-color: yellow;
    color: red;
    padding: 5px;
    font-size: 12px;
    font-weight: bold;
}
</style>


<div style="margin-bottom:20px;">
<div class="section-slide-banner">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-12"  >
				<div class="swiper-button">
					<div class="swiper-container slide-container swiper-data swiper-container-initialized swiper-container-horizontal swiper-container-autoheight" data-pagination="true" data-xxl="1" data-height="true" data-xl="1" data-lg="1" data-md="1" data-xs="1" data-x="1" data-drag="true" data-autoplay="3000" data-space="0" style="cursor: grab;">
								<picture>
									<img src="image/slide1.png" alt="Sale lớn chào hè" class="img-responsive center-block">
								</picture>
						</div>
			</div>
            </div> 
			<div class="col-lg-3 col-12" >
<div class="white component-account d-none d-lg-block" >
	<div class="block-account">
		<div class="image-acc d-flex">
			<img src="image/account.png" alt="Avatar khách hàng" class="lazyload loaded">
			<div class="child-acc">
				<a href="/account" title="Tài khoản">Tài khoản</a>
				
				<?php
						if (isset ($_SESSION["username"])|| isset ($_COOKIE ["user"])){
						$user = isset($_SESSION ["username"])?$_SESSION ["username"]:$_COOKIE ["user"];
						
						?> 
						<span style="color: #2c0606;">
							Xin Chào <?php echo $_SESSION ["username"];?> 
							</span>&nbsp;
							
				<?php } else 
				{
						?> 			
							<span>Xin chào khách</span>
							<?php
				}
				?> 
			</div>
		</div>
		<div class="group-btn text-center d-flex">
		<?php
        if (isset ($_SESSION["username"])|| isset ($_COOKIE ["user"])){
        $user = isset($_SESSION ["username"])?$_SESSION ["username"]:$_COOKIE ["user"];
        
        ?> 
		 
            <a class="btn-acc" href= "logout.php"> Đăng xuất </a> 
<?php } else 
{
        ?> 			
			<a class="btn-acc" href="login.php" title="Đăng nhập">Đăng nhập</a>
			<a class="btn-acc" href="signup.php" title="Đăng ký">Đăng ký</a>
			<?php
}
?> 
		</div>
	</div>
	<ul class="d-flex acction-link">
		<li>
			(<span class="count_item_pr" ><?php echo isset($_SESSION['cart']) && is_array($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?></span>)
			<a href="cart.php" title="Đã thêm">Đã thêm</a>
		</li>
		<li>
			<span class="wishlistCount">0</span>
			<a href="yeu-thich" title="Đã lưu">Đã lưu</a>
		</li>
		<li>
			<span class="compareCount">0</span>
			<a href="so-sanh-san-pham" title="So sánh">So sánh</a>
		</li>
	</ul>
	<div class="list-social d-flex">
		<a href="#" title="Facebook">
			<img alt="Facebook" class="lazyload loaded" src="//bizweb.dktcdn.net/100/507/051/themes/936909/assets/social_1.jpg?1735287986531" data-src="//bizweb.dktcdn.net/100/507/051/themes/936909/assets/social_1.jpg?1735287986531" width="25" height="25">
		</a>
		<a href="#" title="Tiktok">
			<img alt="Tiktok" class="lazyload loaded" src="//bizweb.dktcdn.net/100/507/051/themes/936909/assets/social_2.jpg?1735287986531" data-src="//bizweb.dktcdn.net/100/507/051/themes/936909/assets/social_2.jpg?1735287986531" width="25" height="25">
		</a>
		<a href="#" title="Shopee">
			<img alt="Shopee" class="lazyload loaded" src="//bizweb.dktcdn.net/100/507/051/themes/936909/assets/social_3.jpg?1735287986531" data-src="//bizweb.dktcdn.net/100/507/051/themes/936909/assets/social_3.jpg?1735287986531" width="25" height="25">
		</a>
		<a href="#" title="Lazada">
			<img alt="Lazada" class="lazyload loaded" src="//bizweb.dktcdn.net/100/507/051/themes/936909/assets/social_4.jpg?1735287986531" data-src="//bizweb.dktcdn.net/100/507/051/themes/936909/assets/social_4.jpg?1735287986531" width="25" height="25">
		</a>
	</div>
	<a href="#" title="Sắm iphone 12 series" class="banner_item d-block">
		<img class="img-old img-responsive" alt="Sắm iphone 12 series" src="//bizweb.dktcdn.net/100/507/051/themes/936909/assets/bb-right.jpg?1735287986531">
	</a>
</div>				
			</div>
		</div>
	</div>
</div>
</div>


<div class="product-container">
    <h1 style="float:left">DANH MỤC SẢN PHẨM</h1>
    <br style="clear:both;">

    <div class="product-grid">
        @foreach($data as $row)
            <div class="product-card">
                <a href="{{url('home/chitiet/'.$row->product_id)}}">
                    <div class="discount-label">Giảm {{$row->giam_gia}} %</div>
                    <img src="{{ asset('image/' . $row->hinh_anh_chinh) }}">
                    <h2> {{$row->product_name}}</h2>
                    <p class="price">
                        Giá: 
                        <span class="discounted">
                            {{ number_format($row->gia_khuyen_mai, 0, ",", ".") }}đ
                        </span>
                        <span class="original">
                            {{ number_format($row->gia_goc, 0, ",", ".") }}đ
                        </span>
                    </p>
                </a>
            </div>
        @endforeach
    </div>
</div>

   

</x-web-layout>

