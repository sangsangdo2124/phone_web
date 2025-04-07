<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PhanLoai;
use App\Models\Product;
class AdminController extends Controller
{
    function listproducts(){
        $products = DB::table("san_pham")->get();
        return view("admin.index",compact("products"));
        }
}
