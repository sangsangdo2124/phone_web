@extends('layouts.admin-layout')

@section('title', 'Dashboard')

@section('content')
<div class="p-4">
    <h3 class="mb">Bảng điều khiển</h3>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-primary">Tổng sản phẩm</h6>
                    <h3>{{ $totalProducts }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-success">Đơn hàng hôm nay</h6>
                    <h3>{{ $ordersToday }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="text-warning">Khách hàng</h6>
                    <h3>{{ $CustomersToday }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h3 class="mb">Biểu đồ thống kê doanh thu</h3>
        <select id="thoigian" class="form-select w-25 mb-4">
            <option value="7ngay">7 ngày qua</option>
            <option value="28ngay">28 ngày qua</option>
            <option value="90ngay">90 ngày qua</option>
            <option value="365ngay" selected>365 ngày qua</option>
        </select>
        <canvas id="myChart" height="100"></canvas>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function loadChart(time = '365ngay') {
        fetch('{{ route('load.dashboard') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ thoigian: time })
        })
        .then(res => res.json())
        .then(data => {
            const dates = data.map(item => item.date);
            const orders = data.map(item => item.order);
            const sales = data.map(item => item.sales);

            if (window.myChart && typeof window.myChart.destroy === 'function') {
                window.myChart.destroy();
            }

            const ctx = document.getElementById('myChart').getContext('2d');
            window.myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: dates,
                    datasets: [
                        {
                            label: 'Đơn hàng',
                            data: orders,
                            borderColor: 'blue',
                            backgroundColor: 'rgba(0,0,255,0.1)',
                            fill: true,
                            tension: 0.3,
                        },
                        {
label: 'Doanh thu',
                            data: sales,
                            borderColor: 'green',
                            backgroundColor: 'rgba(0,255,0,0.1)',
                            fill: true,
                            tension: 0.3,
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    }

    // Load mặc định
    loadChart();

    // Thay đổi thời gian
    document.getElementById('thoigian').addEventListener('change', function() {
        loadChart(this.value);
    });
</script>
@endsection