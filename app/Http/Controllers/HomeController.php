<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Book;
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
        return view('admin.dashb'); // Trang admin
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
