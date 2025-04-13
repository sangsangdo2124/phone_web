
<div class="product-details">
    <div class="product-img">
        <img src="{{ asset('img/' . $product->hinh_anh_chinh) }}" alt="{{ $product->ten_san_pham }}">
    </div>
    <div class="product-info">
        <h3>{{ $product->ten_san_pham }}</h3>
        <h4 class="product-price">${{ number_format($product->gia_ban, 2) }}</h4>
        <div class="product-rating">
            @for ($i = 1; $i <= 5; $i++)
                <i class="fa fa-star{{ $i <= $product->rating ? '' : '-o' }}"></i>
            @endfor
        </div>
        <div class="add-to-cart">
			<div class="qty-label">
                Số lượng:
				<div class="input-number" >
                    <input type="number" id="product-number" value="1" min="1">
					<span class="qty-up">+</span>
					<span class="qty-down">-</span>
				</div>
			</div>
        <button class='add-to-cart-btn add-product' sp_id="{{$product->id}}"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</button>
		</div>
        <a href="{{route('products', ['id' => $product->id])}}">Xem chi tiết sản phẩm</a>
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
<script>
    var isLoggedIn = {{ Auth::check() ? 'true' : 'false' }}; // true/false

    $(document).ready(function () {
        $(".qty-up").click(function () {
            var currentValue = parseInt($("#product-number").val());
            $("#product-number").val(currentValue + 1);
        });

        $(".qty-down").click(function () {
            var currentValue = parseInt($("#product-number").val());
            if (currentValue > 1) {
                $("#product-number").val(currentValue - 1);
            }
        });

        $(".add-product").click(function (e) {
            if (!isLoggedIn) {
                $('#loginRequiredModal').modal('show');
                e.preventDefault(); // Ngăn không cho tiếp tục
                return;
            }

            let id = $(this).attr('sp_id');
            let num = $("#product-number").val() || 1;

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{route('cartadd')}}",
                data: { "_token": "{{ csrf_token() }}", "id": id, "num": num },
                success: function (data) {
                    $("#cart-number-product").html(data);
                }
            });
        });
    });
</script>


