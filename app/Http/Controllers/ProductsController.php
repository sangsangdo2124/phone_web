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

    function giaodiendangnhap()
    {
        
        return view("pages.giaodiendangnhap");
    }

    function chitiet($product_id)
    {
        $data = DB::select("select * from dienthoai where product_id = ?",[$product_id])[0];
        return view("pages.chitiet", compact("data"));
    }

    public function cartadd(Request $request)
    {
        $request->validate([
            "product_id"=>["required","numeric"],
            "num"=>["required","numeric"]
        ]);
        $product_id = $request->product_id;
        $num = $request->num;
        $total = 0;
        $cart = [];
        if(session()->has('cart'))
        {
            $cart = session()->get("cart");
            if(isset($cart[$product_id]))
            $cart[$product_id] += $num;
            else
            $cart[$product_id] = $num ;
        }
        else
        {
            $cart[$product_id] = $num ;
        }
        session()->put("cart",$cart);
        return count($cart);
    }

    public function order()
    {
        $cart=[];
        $data =[];
        $quantity = [];
        if(session()->has('cart'))
        {
        $cart = session("cart");
        $list_book = "";
        foreach($cart as $product_id=>$value)
        {
        $quantity[$product_id] = $value;
        $list_book .=$product_id.", ";
        }
        $list_book = substr($list_book, 0,strlen($list_book)-2);
        $data = DB::table("dienthoai")->whereRaw("product_id in (".$list_book.")")->get();
        }
        return view("pages.order",compact("quantity","data"));
    }

}