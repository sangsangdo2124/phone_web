<?php

namespace App\Http\Controllers;

use App\Models\Product;  // Model Product
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Hiển thị sản phẩm theo danh mục
    public function show_category($categoryId)
    {
        // Lấy các sản phẩm theo ID danh mục
        $products = Product::where('id_phan_loai', $categoryId)->get();

        // Truyền dữ liệu vào view
        return view('pages.home', compact('products'));
    }
}
    


