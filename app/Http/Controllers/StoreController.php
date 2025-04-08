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
    
        $categories = DB::table('phan_loai')->get();
        $brands = DB::table('nha_san_xuat')->get();
    
        $query = DB::table('san_pham');
    
        if ($categoryFilter) {
            $query->where('id_phan_loai', $categoryFilter); // Lọc theo danh mục
        }
    
        if ($brandFilter) {
            $query->where('id_hang_sx', $brandFilter); // Lọc theo thương hiệu
        }
    
        $products = $query->paginate(9);
    
        return view('pages.allproducts', compact('products', 'categories', 'brands'));
    }
}    
