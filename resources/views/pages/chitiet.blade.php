<x-web-layout>
    <x-slot name="title">
        Chi tiết
    </x-slot>
    <style>
.row {
   
    
    flex-wrap: nowrap;
    
    margin-left: -15px;
    max-width: 100%;
    padding-right: calc(var(--bs-gutter-x)* .5);
    padding-left: calc(var(--bs-gutter-x)* .5);
    margin-top: var(--bs-gutter-y);
}

.row > * {
    flex-shrink: unset !important;
    width: unset !important;
}




.details-pro {
    z-index: 2;
}


.prview span {
    margin-left: 10px;
    cursor: pointer;
}


.details-pro .group-power {
    border-radius: 5px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
    border-bottom-left-radius: 5px;
    background: linear-gradient(180deg, #f72c0f 0%, #EF9135 100%);
    background-image: linear-gradient(rgb(247, 44, 15) 0%, rgb(239, 145, 53) 100%);
    background-position-x: initial;
    background-position-y: initial;
    background-size: initial;
    background-repeat: initial;
    background-attachment: initial;
    background-origin: initial;
    background-clip: initial;
    background-color: initial;
    position: relative;
    padding: 10px;
    padding-top: 10px;
    padding-right: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
    min-height: 105px;
    margin-top: 5px;
}

.details-pro .group-power p {
    color: #FFF;
    margin: 0;
    font-family: var(--font-base);
    font-size: 14px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

.details-pro .price-box .product-price {
    font-size: 24px;
    color: #FEE71A;
    font-weight: 700;
    margin-right: 10px;
    font-family: var(--font-base);
}

.details-pro .price-box .old-price {
    font-size: 14px;
    color: #fff;
    display: inline-block;
    margin-right: 10px;
}



.quantity_sale {
    padding: 0px;
    padding-top: 0px;
    padding-right: 0px;
    padding-bottom: 0px;
    padding-left: 0px;
    position: relative;
    margin: 10px 0 0;
    margin-top: 10px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
}




.details-pro .kmkemtheo {
    border-radius: 0 0 5px 5px;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    border-bottom-right-radius: 5px;
    border-bottom-left-radius: 5px;
    border: 1px solid #f72c0f var(--main-color);
    border-top-width: 1px;
    border-right-width: 1px;
    border-bottom-width: 1px;
    border-left-width: 1px;
    border-top-style: solid;
    border-right-style: solid;
    border-bottom-style: solid;
    border-left-style: solid;
    border-top-color: initial;
    border-right-color: initial;
    border-bottom-color: initial;
    border-left-color: initial;
    border-image-source: initial;
    border-image-slice: initial;
    border-image-width: initial;
    border-image-outset: initial;
    border-image-repeat: initial;
    background: rgba(255, 203, 173, 0.4);
    background-image: initial;
    background-position-x: initial;
    background-position-y: initial;
    background-size: initial;
    background-repeat: initial;
    background-attachment: initial;
    background-origin: initial;
    background-clip: initial;
    background-color: rgba(255, 203, 173, 0.4);
    padding: 15px;
    padding-top: 15px;
    padding-right: 15px;
    padding-bottom: 15px;
    padding-left: 15px;
    font-size: 14px;
    color: #000000 var(--text-color);
    border-top: 0;
    border-top-width: 0px;
    border-top-style: initial;
    border-top-color: initial;
    margin-top: -3px;
}



.details-pro .kmkemtheo p {
    font-size: 14px;
    line-height: 1.3;
    margin-bottom: 5px;
    padding: 0;
    padding-top: 0px;
    padding-right: 0px;
    padding-bottom: 0px;
    padding-left: 0px;
}





    </style>

    <script>
        $(document).ready(function(){
        $("#add-to-cart").click(function(){
        product_id = "{{$data->product_id}}";
        num = $("#product-number").val()
        $.ajax({
        type:"POST",
        dataType:"json",
        url: "{{route('cartadd')}}",
        data:{"_token": "{{ csrf_token() }}","product_id":product_id,"num":num},
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

    

        <!-- Breadcrumb Section Start -->
        <nav class="bread-crumb">
            <div class="container">
                <ul class="breadcrumb">                 
                    <li class="home" onclick="window.location.href='home.php'">
                        <i class="material-icons">home</i>
                        <i class="material-icons">keyboard_arrow_right</i>
                    </li>
                    <li>
                        <strong><span> 
                            <?php echo "Chi tiết sản phẩm" ?>
                        </span></strong>
                    </li>
                </ul>
            </div>
        </nav>

        
         
        <div class="info">
            <div class="row">   
                <div>                                               
                    <img src= "{{asset('image/'.$data->hinh_anh_chinh)}}"weight = "500px" height = "500px">                                                
                </div>

                <div>                 
                    <h1 style = "color: #000000 var(--text-color);
                                font-family: var(--font-base);
                                line-height: 1.4;
                                font-size: 18px;
                                font-weight: bold;
                                margin: 0 0 10px;
                                display: block;
                                text-transform: capitalize" !important >{{ $data->product_name }}</h1>
                        <div class="details-pro">
                            <div class="group-action-button">
                                            <div class="group-power">                                                
                                                <p>
                                                    Online giá rẻ quá
                                                </p>
                                                    
                                                <div class="product-price">
                                                    <b>{{ number_format($data->gia_khuyen_mai, 0, ",", ".") }}đ</b>
                                                </div>
                                                    <div class="price-compare">
                                                        <span class="old-price">
                                                            <del class="price product-price-old">
                                                            <b>{{ number_format($data->gia_goc, 0, ",", ".") }}đ</b>
                                                            </del>
                                                        </span> 
                                                    </div>
                                                    
                                                </div>                                        
                                            </div>
                                            <div class="kmkemtheo">
                                                <p>Combo ốp lưng, dán màn hình miễn phí</p>
                                            </div>
                                            <div >
                                                <div>
                                                    Thương hiệu: {{ $data->category_brand}}<br>
                                                </div>
                                                <div>
                                                    Loại: <span>Điện thoại</span><br>             
                                                </div>
                                                
                                                <div>
                                                    Thông tin sản phẩm: {{ $data->mo_ta }}<br>
                                                </div>
                                                <div class='mt-1'>
                                                    Số lượng mua:
                                                    <input type='number' id='product-number' size='5' min="1" value="1">
                                                    <button class='btn btn-success btn-sm mb-1' id='add-to-cart'>Thêm vào giỏ hàng</button>
                                                </div>
                                                          
                                            </div> 
                                </div>
                                
                            </div>

                            
                      
                        </div>
                        
                    
               
                </div>
        </div>
    </div>
    
</x-web-layout>










