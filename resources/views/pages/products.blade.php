<x-web-layout>
    <x-slot name="title">
        Chi tiết
    </x-slot>
    <style>
        .product-name {
            text-transform: uppercase;
            font-size: 14px;
            font-weight: 700;
        }

        .product-details .add-to-cart .qty-label {
            display: inline-block;
            font-weight: 500;
            font-size: 12px;
            text-transform: uppercase;
            margin-right: 15px;
            margin-bottom: 0px;
        }


        .product .product-body .product-price {
            color: #D10024;
            font-size: 18px;
        }

        .product .product-body .product-price .product-old-price {
            font-size: 70%;
            font-weight: 400;
            color: #8D99AE;
        }
    </style>


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

    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb-tree">
                        <li><a href="{{route('index')}}">Home</a></li>
                        <li><a href="#">All Categories</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Headphones</a></li>
                        <li class="active">Product name goes here</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->

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
                            <div class="qty-label"><br>
                                Số lượng mua:

                                <input type="number" id='product-number' size='2' min="1" value="1"
                                    class="form-control d-inline-block w-auto">
                                <button class="add-to-cart-btn" id='add-to-cart'>Thêm vào giỏ hàng</button>


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