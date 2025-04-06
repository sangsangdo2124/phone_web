<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function all()
    {
        $products = DB::table('san_pham')->paginate(9);
        return view("pages.allproducts", compact("products"));
    }


    public function index()
    {
        // Lấy tất cả danh mục sản phẩm (phan_loai) mà parent_id là NULL
        $categories = DB::table('phan_loai')->get();

        // Lấy tất cả thương hiệu (nha_san_xuat)
        $brands = DB::table('nha_san_xuat')->get();

        return view('store.index', compact('categories', 'brands'));
    }



}