<?php

namespace App\Http\Controllers;

use App\Models\Product;  // Model Product
use App\Models\PhanLoai; // ✅ Thêm dòng này để lấy danh sách phân loại
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Hiển thị sản phẩm theo danh mục
    public function show_category($categoryId)
    {
        // Lấy sản phẩm theo ID phân loại
        $products = Product::where('id_phan_loai', $categoryId)->get();

        // Lấy danh sách các loại sản phẩm
        $collections = PhanLoai::all();

        // Gom nhóm sản phẩm theo phân loại
        $groupedProducts = $products->groupBy('id_phan_loai');

        // Truyền dữ liệu vào view
        return view('pages.home', compact('products', 'collections', 'groupedProducts'));
    }

    // Lọc sản phẩm theo ?loai=ID
    public function filterByLoai(Request $request)
    {
        $categoryId = $request->query('loai');

        $products = Product::where('id_phan_loai', $categoryId)->get();
        $collections = PhanLoai::all();
        $groupedProducts = $products->groupBy('id_phan_loai');

        return view('pages.home', compact('products', 'collections', 'groupedProducts'));
    }
}
