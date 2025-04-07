<?php

namespace App\Http\Controllers;
Use App\Models\Product;
use Illuminate\Http\Request;
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

                if (count($cart) > 0) {
                    $quantity = $cart;
                    $ids = array_keys($cart); // Lấy danh sách ID sản phẩm
                    $data = DB::table("san_pham")->whereIn("id", $ids)->get();
                }
            }

            return view("pages.order", compact("quantity", "data"));
        }

    /*public function order()
    {
        $cart = [];
        $data = [];
        $quantity = [];
        if (session()->has('cart')) {
            $cart = session("cart");
            $list_product = "";
            foreach ($cart as $id => $value) {
                $quantity[$id] = $value;
                $list_product .= $id . ", ";
            }
            $list_product = substr($list_product, 0, strlen($list_product)-2);
            $data = DB::table("san_pham")->whereRaw("id in (" . $list_product . ")")->get();
        }
        return view("pages.order", compact("quantity", "data"));
    }*/

    public function Muangay(Request $request)
        {
            $request->validate([
                "id" => ["required", "numeric"]
            ]);

            $id = $request->id;
            $cart = [];

            // Nếu đã có giỏ hàng thì lấy ra
            if (session()->has('cart')) {
                $cart = session()->get('cart');
            }

            // Nếu sản phẩm đã tồn tại trong giỏ => tăng số lượng
            if (isset($cart[$id])) {
                $cart[$id] += 1;
            } else {
                $cart[$id] = 1; // chưa có thì thêm mới với số lượng 1
            }

            // Cập nhật giỏ hàng
            session()->put('cart', $cart);

            // Điều hướng đến trang đặt hàng
            return redirect()->route('order');
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
        if (Auth::check()) {
            $request->validate([
                "hinh_thuc_thanh_toan" => ["required", "numeric"]
            ]);
        } else {
            $request->validate([
                "hinh_thuc_thanh_toan" => ["required", "numeric"],
                "name" => ["required", "string"],
                "email" => ["required", "email"],
                "address" => ["required", "string"]
            ]);
        }

        $data = [];
        $quantity = [];
        if (session()->has('cart')) {
            $order = [
                "ngay_dat_hang" => DB::raw("now()"),
                "tinh_trang" => 1,
                "hinh_thuc_thanh_toan" => $request->hinh_thuc_thanh_toan,
                "user_id" => Auth::check() ? Auth::user()->id : null,
                "name" => Auth::check() ? Auth::user()->name : $request->name,
                "email" => Auth::check() ? Auth::user()->email : $request->email,
                "address" => Auth::check() ? (Auth::user()->address ?? 'Không có địa chỉ') : $request->address
            ];

            DB::transaction(function () use ($order) {
                $id_don_hang = DB::table("don_hang")->insertGetId($order);
                $cart = session("cart");
                $list_product = "";
                $quantity = [];
                foreach ($cart as $id => $value) {
                    $quantity[$id] = $value;
                    $list_product .= $id . ", ";
                }
                $list_product = substr($list_product, 0, strlen($list_product) - 2);
                $data = DB::table("san_pham")->whereRaw("id in (" . $list_product . ")")->get();
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
                session()->forget('cart');
            });
        }
        return redirect()->route('thanks')->with('success', 'Đặt hàng thành công!');

        //return view("pages.order", compact('data', 'quantity'));
    }



     //Hàm để hiển thị Quick View
     public function quickView($id)
     {
         // Lấy sản phẩm từ cơ sở dữ liệu
         $product = Product::findOrFail($id);
 
         // Trả về thông tin sản phẩm dưới dạng HTML
         return view('components.quick-view-content', compact('product'));
     }

}



