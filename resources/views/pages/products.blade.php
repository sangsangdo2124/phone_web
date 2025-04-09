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
                    <img src="{{asset('img/' . $data->hinh_anh_chinh)}}" weight="500px" height="500px">
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
                            <button class="add-to-cart-btn" id='add-to-cart'><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                        </div>
                            
                        </div>
                        <ul class="product-btns">
                            <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>

                        </ul>

                    </div>
                </div>
                <!-- /Product details -->

                <!-- Product tab -->
                <div class="col-md-12">
                    <div id="product-tab">
                        <!-- product tab nav -->
                        <ul class="tab-nav">
                            <li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li>
                        </ul>
                        <!-- /product tab nav -->
                    </div>
                </div>
                <!-- /product tab -->
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
  $(document).ready(function(){
    $(".add-product").click(function(){
      id = $(this).attr("sp_id");
      num = 1;
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
<script>
    $(document).ready(function(){
        $(".add-product").click(function(){
        
            id = "{{$data->id}}";
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
