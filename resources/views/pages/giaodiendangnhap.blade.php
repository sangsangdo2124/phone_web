<x-web-layout>
    <x-slot name='title'>
        Giao diện đăng nhập
    </x-slot>
<style>

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

 

</x-web-layout>

