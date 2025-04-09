<!-- store products -->


<x-web-layout>
    <x-slot name='title'>
        Tất cả sản phẩm
    </x-slot>

        <!-- store products -->
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img src="{{ asset('img/' . $product->hinh_anh_chinh) }}" alt="">
                                <div class="product-label">
                                    @if($product->is_new==1)
                                        <span class="new">NEW</span>
                                    @endif
                                </div>
                            </div>
                            <div class="product-body">
                                <h3 class="product-name"><a href="{{route('products', ['id' => $product->id])}}">{{ $product->ten_san_pham }}</a></h3>
                                <h4 class="product-price">
                                    ${{ number_format($product->gia_ban, 2) }}
                                </h4>
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                    
                                    <!-- Quick View Button -->
                                    <!-- Nút Quick View -->
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
								<button class='add-to-cart-btn add-product' sp_id="{{$product->id}}"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
							</div>
                        </div>
                    </div>
                @endforeach
                </div>
                        
                <div class="store-filter clearfix">
                    <span class="store-qty">Showing {{ $products->firstItem() }} - {{ $products->lastItem() }} of {{ $products->total() }} product</span>
                <ul class="store-pagination">
                    {{ $products->links() }}
                </ul>
            </div>



</x-web-layout>
<script>
$(document).ready(function() {
    // Khi người dùng nhấn nút "Quick View"
    $('.quick-view').on('click', function() {
        var productId = $(this).data('id'); // Lấy id sản phẩm

        // Gửi AJAX request để lấy thông tin sản phẩm
        $.ajax({
            url: '/quick-view/' + productId, // Địa chỉ API để lấy dữ liệu sản phẩm
            method: 'GET',
            success: function(response) {
                // Hiển thị thông tin sản phẩm vào modal
                $('#quick-view-content').html(response);
                $('#quick-view-modal').show(); // Hiển thị modal
            },
            error: function() {
                alert('Không thể tải thông tin sản phẩm.');
            }
        });
    });

    // Đóng modal khi nhấn vào dấu "X"
    $('.close').on('click', function() {
        $('#quick-view-modal').hide();
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
