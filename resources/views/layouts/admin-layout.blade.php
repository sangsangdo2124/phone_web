<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Trang quản trị')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <style>
        body {
            background: #f1f4f9;
            font-family: 'Segoe UI', sans-serif;
        }
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(to bottom right, #10131a, #1e2633);
            color: white;
            width: 230px;
        }
        .sidebar h4 {
            font-weight: bold;
        }
        .sidebar a {
            color: #cfd8e3;
            border-radius: 8px;
            margin-bottom: 8px;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }
        .sidebar a:hover, .sidebar a.active {
            background: #2d3748;
            color: white;
        }
        .sidebar a i {
            margin-right: 8px;
        }
        .topbar {
            background: white;
            padding: 15px 25px;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .topbar span {
            font-weight: 500;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        .card-body h3 {
            font-weight: 700;
            margin-top: 5px;
        }
        .card:hover {
            transform: translateY(-3px);
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar p-4">
        <h4 class="text-white mb-4">EGO MOBILE</h4>
        <a href="{{ route('redirect') }}" class="{{ request()->routeIs('redirect') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>

        <a href="{{ route('listproducts') }}" class="{{ request()->routeIs('listproducts') ? 'active' : '' }}">
            <i class="bi bi-box-seam"></i> Sản phẩm
        </a>

        <a href="{{ route('orders.list') }}" class="{{ request()->routeIs('orders.list') ? 'active' : '' }}">
            <i class="bi bi-cart4"></i> Đơn hàng
        </a>

        <a href="{{ route('customers') }}" class="{{ request()->routeIs('customers') ? 'active' : '' }}">
            <i class="bi bi-people-fill"></i> Khách hàng
        </a>

        <a href="{{ route('settings') }}" class="{{ request()->routeIs('settings') ? 'active' : '' }}">
            <i class="bi bi-gear-fill"></i> Cài đặt
        </a>

    </div>

    <!-- Content -->
    <div class="flex-grow-1">
        <div class="topbar">
            <span>Chào mừng bạn đến với trang quản trị!</span>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-decoration-none text-dark dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Đăng xuất</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="p-4">
            @yield('content')


        </div>
    </div>
</div>
@yield('scripts')

</body>
</html>
