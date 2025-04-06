<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function AdminLogin(Request $request)
    {
        $taikhoan = $request->input('username');
        $matkhau = $request->input('password');

        if (empty($taikhoan) || empty($matkhau)) {
            return back()->with('error', 'Tài khoản và mật khẩu không được để trống!');
        }

        $admin = DB::table('admin')
                    ->where('username', $taikhoan)
                    ->where('password', $matkhau)
                    ->first();

        if ($admin) {
            // Login thành công
            return view('admin.dashb'); // sửa đúng tên file nếu là dashb.blade.php thì ghi 'admin.dashb'
        } else {
            return back()->with('error', 'Sai tài khoản hoặc mật khẩu!');
        }
    }
}
