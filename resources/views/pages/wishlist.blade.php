<x-web-layout>
    <x-slot name='title'>
        Danh sách yêu thích
    </x-slot>

    <style>
        .img_chinh {
            width: 100px;
            height: 100px;
        }
    </style>

    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb-tree">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li class="active">Yêu thích</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- DANH SÁCH YÊU THÍCH -->
    <div style='color:#e91e63; font-weight:bold; font-size:16px; text-align:center'>DANH SÁCH SẢN PHẨM YÊU THÍCH</div><br>

    <table class='table table-bordered text-center' style='margin: 0 auto; width: 70%'>
        <thead>
            <tr>
                <th>STT</th>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Chi tiết</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            @if(count($wishlist) > 0)
                @foreach($wishlist as $key => $product)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <img class="img_chinh" src="{{ asset('img/' . $product->hinh_anh_chinh) }}">
                        </td>
                        <td>{{ $product->ten_san_pham }}</td>
                        <td>1</td>
                        <td>{{ number_format($product->gia_ban, 0, ',', '.') }}đ</td>
                        <td>
                            <a href="{{ route('chitiet', ['id' => $product->id]) }}" class="btn btn-sm btn-info">Chi tiết</a>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('wishlistdelete') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="submit" value="Xóa" class="btn btn-sm btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7">Danh sách yêu thích của bạn đang trống.</td>
                </tr>
            @endif
        </tbody>
    </table>
</x-web-layout>
