<x-web-layout>
    <x-slot name='title'>Tài khoản</x-slot>

    <style>
        body {
            background-color: #f7f7f7;
        }

        .account-wrapper {
            display: flex;
            gap: 20px;
            padding: 30px;
        }

        .sidebar {
            width: 250px;
            background: white;
            border-radius: 10px;
            padding: 20px;
            height: fit-content;
        }

        .sidebar a {
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 10px;
            color: black;
            border-radius: 8px;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .sidebar a.active,
        .sidebar a:hover {
            background-color: #ffe5e5;
            color: #d90000;
        }

        .hot-label {
            font-size: 10px;
            color: white;
            background: red;
            padding: 2px 5px;
            border-radius: 4px;
            margin-left: 5px;
        }

        .profile-card {
            flex: 1;
            background: white;
            border-radius: 10px;
            padding: 30px;
        }

        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .form-group {
            text-align: left;
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: 600;
        }
    </style>

    <div class="account-wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <a href="{{ route ('accountpanel') }}" ><i class="glyphicon glyphicon-home mr-2"></i>Trang chủ</a>
            <a href="{{ route('lichsumuahang') }}"><i class="glyphicon glyphicon-list-alt mr-2"></i>Lịch sử mua hàng</a>
            <a href="{{ route('taikhoan') }}"><i class="glyphicon glyphicon-user mr-2"></i>Tài khoản của bạn</a>
        </div>

        <!-- Profile content -->
        <div class="profile-card text-center">
            @if ($errors->any())
                <div style='color:red;'>
                    <div>{{ __('Whoops! Something went wrong.') }}</div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <!-- Avatar -->
            <img class="avatar" alt="Avatar"   src="{{ $user->profile_photo_path ? asset('storage/profile/' . $user->profile_photo_path) : asset('img/default-avatar.jpg')}}"width ="70">

            <h4 class="mb-3">{{ $user->name }}</h4>

            <form method='post' action="{{ route('saveinfo') }}" enctype="multipart/form-data" style="max-width: 500px; margin: 0 auto; text-align: left;">
                {{ csrf_field() }}

                <input type='hidden' value='{{ $user->id }}' name='id'>

                <div class="form-group">
                    <label>Tên</label>
                    <input type='text' class='form-control' name='name' value="{{ $user->name }}">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type='email' class='form-control' name='email' value="{{ $user->email }}" readonly>
                </div>

                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type='text' class='form-control' name='phone' value="{{ $user->phone }}">
                </div>

                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type='text' class='form-control' name='dia_chi' value="{{ $user->dia_chi }}">
                </div>

                <div class="form-group">
                    <label>Ảnh đại diện</label><br>
                    <input type="file" name="profile_photo_path" accept="image/*" class="form-control-file">
                </div>

                <div class="text-center" >
                
                    <button class='btn btn-danger mt-2' type='submit'>Cập nhật thông tin</button>
                </div>
            </form>
        </div>
    </div>
</x-web-layout>
