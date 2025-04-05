<?php


namespace App\Http\Controllers;

use App\Models\Product;  // Model Product
use Illuminate\Http\Request;
use App\Models\PhanLoai;

class HomeController extends Controller
{
    function home()
    {
        return view("pages.home");
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
