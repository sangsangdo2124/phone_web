<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use App\Models\Product;  // Model Product
use App\Models\PhanLoai;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if($usertype == "1")
        {
            $collections = PhanLoai::all();
            $latestProducts = Product::where('is_new', 1)->get();
            // Gom nhóm sản phẩm theo phân loại
            $groupedProducts = $latestProducts->groupBy('id_phan_loai');
            $today = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

            $totalProducts = DB::table('chi_tiet_don_hang')
                ->join('don_hang', 'chi_tiet_don_hang.ma_don_hang', '=', 'don_hang.ma_don_hang')
                ->whereDate('don_hang.ngay_dat_hang', $today) // lọc theo ngày hôm nay
                ->where('don_hang.tinh_trang', 1) // chỉ đơn đã xử lý
                ->sum('chi_tiet_don_hang.so_luong');
            
    
        // Đơn hàng hôm nay
        $ordersToday = DB::table('don_hang')
            ->whereDate('ngay_dat_hang', $today)
            ->count();

            $CustomersToday = DB::table('don_hang')
            ->whereDate('ngay_dat_hang', $today)
            ->where('tinh_trang', 1) // chỉ đơn đã xử lý
            ->distinct('user_id')
            ->count('user_id');
            // Truyền dữ liệu vào view
            return view('admin.TrangChu', compact('collections','groupedProducts','latestProducts','totalProducts','ordersToday','CustomersToday'));
        }
        else 
        {
            return $this->index();
           
        }
    }
    
    // Hiển thị sản phẩm mới nhất
    public function index()
    {
        // Lấy sản phẩm mới nhất
        $collections = PhanLoai::all();
        $latestProducts = Product::where('is_new', 1)->get();
        // Gom nhóm sản phẩm theo phân loại
        $groupedProducts = $latestProducts->groupBy('id_phan_loai');

        // Truyền dữ liệu vào view
        return view('pages.home', compact('collections','groupedProducts','latestProducts'));
    }

}
