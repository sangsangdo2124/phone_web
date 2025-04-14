<x-web-layout>
    <x-slot name="title">
        Chi tiết
    </x-slot>
    
    <!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="{{ url('/') }}">Home</a></li>
							<li><a href="#">All Categories</a></li>
							<li><a href="#">Accessories</a></li>
							<li><a href="#">Headphones</a></li>
							<li class="active"><a href="{{route('products', ['id' => $data->id])}}"></a></li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
    <!-- BREADCRUMB -->

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <img src="{{asset('img/' . $data->hinh_anh_chinh)}}" width="500px" height="400px">
                </div>


                <!-- Product details -->
                <div class="col-md-6">
                    <div class="product-details">
                        <br><br>
                        <h2 class="product-name">{{ $data->ten_san_pham }}</h2><br>
                        <div>
                            <h3 class="product-price"> <b>{{ number_format($data->gia_ban, 0, ",", ".") }}đ</b></h3>
                            <span class="product-available">In Stock</span>
                        </div>

                        <div>
                            Thông tin sản phẩm: {{ $data->mo_ta }}<br>
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


                            <div class="d-flex flex-row gap-2 mt-3 align-items-center">
                                <form method="POST" action="{{ route('Muangay') }}" class="m-0 p-0" style="display: inline;" id="muangay-form">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                    <input type="hidden" name="so_luong" id="muangay-quantity">
                                    <button type="submit" class="add-to-cart-btn add-product">
                                        <i class="fa fa-bolt"></i> Mua ngay
                                    </button>
                                </form>

                                <button class="add-to-cart-btn" id="add-to-cart">
                                    <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng
                                </button>
                            </div>
                        </div>
                            
                        </div>
                        <ul class="product-btns">
                            <li><a href="#"><i class="fa fa-heart-o"></i> Thêm vào danh sách yêu thích</a></li>

                        </ul>

                    </div>
                </div>
                <!-- /Product details -->

                <!-- Product tab -->
                <div class="col-md-12">
                    <div id="product-tab">
                        <!-- product tab nav -->
                        <ul class="tab-nav">
                            <li><a data-toggle="tab" href="#tab3">Đánh giá (3)</a></li>
                        </ul>
                        <!-- /product tab nav -->
                    </div>
                </div>
                <!-- /product tab -->
            </div>
        </div>
    </div>
</x-web-layout>
 <script>
        var isLoggedIn = {{ Auth::check() ? 'true' : 'false' }} === true;

        $(document).ready(function () {
            $("#add-to-cart").click(function () {
                if (!isLoggedIn) {
                    $('#loginRequiredModal').modal('show');
                    return;
                }

                let id = "{{$data->id}}";
                let num = $("#product-number").val();
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
<script>
    $(document).ready(function () {
        $('#muangay-form').on('submit', function () {
            let quantity = $('#product-number').val();
            $('#muangay-quantity').val(quantity);
        });
    });
</script>
