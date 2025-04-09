<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    function home()
    {
        $data = DB::select("select * from san_pham order by gia_ban");
        return view("pages.home", compact("data"));
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

        if (Auth::check()) {
            $userId = Auth::id();

            // Tìm xem đã có sản phẩm này trong giỏ chưa
            $item = DB::table('cart_items')
                ->where('user_id', $userId)
                ->where('san_pham_id', $id)
                ->first();

            if ($item) {
                DB::table('cart_items')
                    ->where('id', $item->id)
                    ->update(['so_luong' => $item->so_luong + $num]);
            } else {
                DB::table('cart_items')->insert([
                    'user_id' => $userId,
                    'san_pham_id' => $id,
                    'so_luong' => $num,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Cập nhật session giỏ hàng nếu muốn dùng cho giao diện
            $cart = DB::table('cart_items')->where('user_id', $userId)->pluck('so_luong', 'san_pham_id')->toArray();
            session()->put('cart', $cart);
            return count($cart);

        } else {
            // Xử lý session nếu chưa đăng nhập (dự phòng)
            $cart = session()->get("cart", []);
            if (isset($cart[$id])) {
                $cart[$id] += $num;
            } else {
                $cart[$id] = $num;
            }
            session()->put("cart", $cart);
            return count($cart);
        }
    }


    public function order()
    {

        $data = [];
        $quantity = [];

        if (Auth::check()) {
            $cartItems = DB::table('cart_items')->where('user_id', Auth::id())->get();

            if ($cartItems->count()) {
                $productIds = $cartItems->pluck('san_pham_id')->toArray();
                $data = DB::table('san_pham')->whereIn('id', $productIds)->get();

                foreach ($cartItems as $item) {
                    $quantity[$item->san_pham_id] = $item->so_luong;
                }
            }
        }
        return view("pages.order", compact("quantity", "data"));
    }


    public function cartdelete(Request $request)
    {
        $request->validate([
            "id" => ["required", "numeric"]
        ]);

        $id = $request->id;

        if (Auth::check()) {
            DB::table('cart_items')->where('user_id', Auth::id())->where('san_pham_id', $id)->delete();
        }
        return redirect()->route('order');
    }

    public function ordercreate(Request $request)
    {
        $request->validate([
            "hinh_thuc_thanh_toan" => ["required", "numeric"]
        ]);

        $data = [];
        $quantity = [];

        if (Auth::check()) {
            $cartItems = DB::table('cart_items')->where('user_id', Auth::id())->get();

            if ($cartItems->count()) {
                $order = [
                    "ngay_dat_hang" => DB::raw("now()"),
                    "tinh_trang" => 1,
                    "hinh_thuc_thanh_toan" => $request->hinh_thuc_thanh_toan,
                    "user_id" => Auth::id()
                ];

                DB::transaction(function () use ($order, $cartItems, &$data, &$quantity) {
                    $id_don_hang = DB::table("don_hang")->insertGetId($order);

                    $productIds = $cartItems->pluck('san_pham_id')->toArray();
                    $data = DB::table("san_pham")->whereIn("id", $productIds)->get();

                    foreach ($cartItems as $item) {
                        $quantity[$item->san_pham_id] = $item->so_luong;
                    }

                    $detail = [];
                    foreach ($data as $row) {
                        $detail[] = [
                            "ma_don_hang" => $id_don_hang,
                            "product_id" => $row->id,
                            "so_luong" => $quantity[$row->id],
                            "don_gia" => $row->gia_ban
                        ];
                    }

                    DB::table("chi_tiet_don_hang")->insert($detail);
                    DB::table("cart_items")->where('user_id', Auth::id())->delete();
                    // Xoá biến giỏ hàng để không truyền về view
                    $data = [];
                    $quantity = [];
                });
            }

        }
        return view("pages.thankyou", [
            'ngay_giao_du_kien' => now()->addDays(3)->format('d/m/Y')
        ]);   
     }

    public function cartCount()
    {
        $count = 0;
        if (Auth::check()) {
            $count = DB::table('cart_items')->where('user_id', Auth::id())->count();
        } elseif (session()->has('cart')) {
            $count = count(session('cart'));
        }

        return response()->json($count);
    }

    public function checkout()
{
    $user = DB::table("users")->whereRaw("id=?", [Auth::user()->id])->first();

    $data = [];
    $quantity = [];

    if (Auth::check()) {
        $cartItems = DB::table('cart_items')->where('user_id', Auth::id())->get();

        if ($cartItems->count()) {
            $productIds = $cartItems->pluck('san_pham_id')->toArray();
            $data = DB::table('san_pham')->whereIn('id', $productIds)->get();

            foreach ($cartItems as $item) {
                $quantity[$item->san_pham_id] = $item->so_luong;
            }
        }
    }

    return view("pages.checkout", compact("data", "quantity", "user"));
}




}



