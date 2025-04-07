
<x-web-layout>
    <x-slot name='title'>
        Thankiu
    </x-slot>

    <div class="container text-center mt-5">
    <h2>🎉 Đặt hàng thành công!</h2>
    <p>Cảm ơn bạn đã mua hàng.</p>
    <p>🗓️ Ngày giao dự kiến: <strong>{{ $ngay_giao_du_kien }}</strong></p>
    <a href="{{ route('redirect') }}" class="btn btn-danger mt-3">Tiếp tục mua sắm</a>
</div>


    
</x-book-layout>