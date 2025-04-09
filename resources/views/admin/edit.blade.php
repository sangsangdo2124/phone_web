@if (session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>ID:</label>
    <input type="number" name="id" value="{{ old('id', $product->id) }}" required><br>

    <label>Tên sản phẩm:</label>
    <input type="text" name="ten_san_pham" value="{{ old('ten_san_pham', $product->ten_san_pham) }}" required><br>

    <label>Mô tả:</label>
    <textarea name="mo_ta">{{ old('mo_ta', $product->mo_ta) }}</textarea><br>

    <label>Giá bán:</label>
    <input type="number" name="gia_ban" value="{{ old('gia_ban', $product->gia_ban) }}" required><br>

    <label>Hình ảnh hiện tại:</label><br>
    @if($product->hinh_anh_chinh)
        <img src="{{ asset('img/' . $product->hinh_anh_chinh) }}" width="120px"><br>
    @endif

    <label>Chọn ảnh mới (nếu muốn):</label>
    <input type="file" name="hinh_anh_chinh"><br>

    <button type="submit">Cập nhật</button>
</form>