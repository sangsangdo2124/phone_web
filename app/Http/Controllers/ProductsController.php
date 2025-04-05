<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    function home()
    {
        $data = DB::select("select * from san_pham order by gia_ban");
        return view("pages.home", compact("data"));
    }

    function giaodiendangnhap()
    {

        return view("pages.giaodiendangnhap");
    }

    function products($id)
    {
        $data = DB::select("select * from san_pham where id = ?", [$id])[0];
        return view("pages.products", compact("data"));
    }




    public function cartadd(Request $request)
    {
        $request->validate([
            "id" => ["required", "numeric"],
            "num" => ["required", "numeric"]
        ]);
        $id = $request->id;
        $num = $request->num;
        $total = 0;
        $cart = [];
        if (session()->has('cart')) {
            $cart = session()->get("cart");
            if (isset($cart[$id]))
                $cart[$id] += $num;
            else
                $cart[$id] = $num;
        } else {
            $cart[$id] = $num;
        }
        session()->put("cart", $cart);
        return count($cart);
    }

    public function order()
    {
        $cart = [];
        $data = [];
        $quantity = [];
        if (session()->has('cart')) {
            $cart = session("cart");
            $list_book = "";
            foreach ($cart as $id => $value) {
                $quantity[$id] = $value;
                $list_book .= $id . ", ";
            }
            $list_book = substr($list_book, 0, strlen($list_book) - 2);
            $data = DB::table("san_pham")->whereRaw("id in (" . $list_book . ")")->get();
        }
        return view("pages.order", compact("quantity", "data"));
    }

    
    public function cartdelete(Request $request)
    {
        $request->validate([
            "id" => ["required", "numeric"]
        ]);
        $id = $request->id;
        $total = 0;
        $cart = [];
        if (session()->has('cart')) {
            $cart = session()->get("cart");
            unset($cart[$id]);
        }
        session()->put("cart", $cart);
        return redirect()->route('order');
    }

    public function ordercreate(Request $request)
    {
        $request->validate([
            "hinh_thuc_thanh_toan" => ["required", "numeric"]
        ]);
        $data = [];
        $quantity = [];
        if (session()->has('cart')) {
            $order = [
                "ngay_dat_hang" => DB::raw("now()"),
                "tinh_trang" => 1,
                "hinh_thuc_thanh_toan" => $request->hinh_thuc_thanh_toan,
                "user_id" => Auth::user()->id
            ];

            DB::transaction(function () use ($order) {
                $id_don_hang = DB::table("don_hang")->insertGetId($order);
                $cart = session("cart");
                $list_sp = "";
                $quantity = [];
                foreach ($cart as $id => $value) {
                    $quantity[$id] = $value;
                    $list_sp .= $id . ", ";
                }
                $list_sp = substr($list_sp, 0, strlen($list_sp) - 2);
                $data = DB::table("dienthoai")->whereRaw("product_id in (" . $list_sp . ")")->get();
                $detail = [];
                foreach ($data as $row) {
                    $detail[] = [
                        "ma_don_hang" => $id_don_hang,
                        "product_id" => $row->id,
                        "so_luong" => $quantity[$row->id],
                        "don_gia" => $row->gia_ban
                    ];
                }
                DB::table("order")->insert($detail);
                session()->forget('cart');
            });
        }
        return view("pages.order", compact('data', 'quantity'));
    }



}



