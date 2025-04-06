
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
		    <button class="add-to-cart-btn" id='add-to-cart'><i class="fa fa-shopping-cart"></i> add to cart</button>
		</div>
        <a href="{{route('products', ['id' => $product->id])}}">Xem chi tiết sản phẩm</a>
    </div>
</div>

<script>
    $(document).ready(function(){
        //Tăng số lượng khi nhấn vào dấu cộng
        $(".qty-up").click(function(){
            var currentValue = parseInt($("#product-number").val());
            var newValue = currentValue + 1;
            $("#product-number").val(newValue);  // Cập nhật lại giá trị input
        });

        // Giảm số lượng khi nhấn vào dấu trừ
        $(".qty-down").click(function(){
            var currentValue = parseInt($("#product-number").val());
            if (currentValue > 1) {  // Đảm bảo số lượng không nhỏ hơn 1
                var newValue = currentValue - 1;
                $("#product-number").val(newValue);  // Cập nhật lại giá trị input
            }
        });

        $("#add-to-cart").click(function(){
            id = "{{$product->id}}";
            num = $("#product-number").val()
            $.ajax({
                type:"POST",
                dataType:"json",
                url: "{{route('cartadd')}}",
                data:{"_token": "{{ csrf_token() }}","id":id,"num":num},
                beforeSend:function(){
                },
                success:function(data){
                    $("#cart-number-product").html(data);
                },
                error: function (xhr,status,error){
                },
                complete: function(xhr,status){
                }
            });
        });
    });
</script>
