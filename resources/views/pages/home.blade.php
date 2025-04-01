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


<div class="product-container">
    <h1 style="float:left">DANH MỤC SẢN PHẨM</h1>
    <br style="clear:both;">

    <div class="product-grid">
        @foreach($data as $row)
            <div class="product-card">
                <a href="#">
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

