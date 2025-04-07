<x-web-layout>
    <x-slot name='title'>
        Cảm ơn
    </x-slot>

    <div class="container mt-5 text-center">
        <h2 style="color: green;">🎉 Đặt hàng thành công!</h2>
        <p>Cảm ơn bạn đã mua hàng. Chúng tôi sẽ liên hệ sớm để xác nhận đơn hàng.</p>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ url('/') }}" class="btn btn-primary mt-3">Tiếp tục mua sắm</a>
    </div>
</x-web-layout>
