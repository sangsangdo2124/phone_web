<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\LoaiSanPham;
use App\Models\NhaSanXuat;

class StoreController extends Controller
{
    public function all()
    {
        $products = DB::table('san_pham')->paginate(9);
        return view("pages.allproducts", compact("products"));
    }

    public function index(Request $request)
    {
        $categoryFilter = $request->query('category');
        $brandFilter = $request->query('brand');
        $searchTerm = $request->query('search');
    
        $categories = DB::table('phan_loai')->get();
        $brands = DB::table('nha_san_xuat')->get();
    
        $query = DB::table('san_pham');
    
        if ($categoryFilter) {
            $query->where('id_phan_loai', $categoryFilter);
        }
    
        if ($brandFilter) {
            $query->where('id_hang_sx', $brandFilter);
        }
    
        if ($searchTerm) {
            $query->where('ten_san_pham', 'LIKE', '%' . $searchTerm . '%');
        }
    
        $products = $query->paginate(9)->appends($request->query()); // giữ lại query khi phân trang
    
        return view('pages.allproducts', compact('products', 'categories', 'brands'));
    }
    
}    
  
  /*
        $categoryId = $request->query('category'); // Lấy ?category= từ URL, Lọc theo danh mục
        $brandId = $request->query('brand');       // Lọc theo thương hiệu

        // Bắt đầu query sản phẩm
        $query = DB::table('san_pham');

        // Nếu có danh mục, thêm điều kiện
        if ($categoryId) {
            $query->where('id_phan_loai', $categoryId);
        }

        // Nếu có thương hiệu, thêm điều kiện
        if ($brandId) {
            $query->where('id_hang_sx', $brandId);
        }

        // Phân trang kết quả
        $products = $query->paginate(9);

        // Danh mục và thương hiệu
        $categories = DB::table('phan_loai')->get();
        $brands = DB::table('nha_san_xuat')->get();

        return view('pages.allproducts', compact('categories', 'brands', 'products'));
    }


    /*public function index(Request $request)
    {
        $categoryId = $request->query('category'); // Lấy ?category= từ URL

         //Lọc sản phẩm theo danh mục nếu có
        if ($categoryId) {
            $products = DB::table('san_pham')->where('id_phan_loai', $categoryId)->paginate(9);
        } else {
            $products = DB::table('san_pham')->paginate(9);
        }

        // Danh sách danh mục và thương hiệu
        $categories = DB::table('phan_loai')->get();
        $brands = DB::table('nha_san_xuat')->get();

        return view('pages.allproducts', compact('categories', 'brands', 'products'));
    }



}*/

