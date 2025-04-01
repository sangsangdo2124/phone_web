<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    function home()
    {
        $data = DB::select("select * from dienthoai order by gia_goc");
        return view("pages.home", compact("data"));
    }
}