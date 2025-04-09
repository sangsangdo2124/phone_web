<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

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

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
    $request->validate([
        'id' => 'required|integer',
        'ten_san_pham' => 'required|string|max:255',
        'mo_ta' => 'nullable|string',
        'gia_ban' => 'required|numeric',
        'hinh_anh_chinh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $product = Product::findOrFail($id);

    // Update thông tin cơ bản
    $product->id = $request->input('id'); // Cập nhật ID (ít dùng nhưng bạn yêu cầu)
    $product->ten_san_pham = $request->input('ten_san_pham');
    $product->mo_ta = $request->input('mo_ta');
    $product->gia_ban = $request->input('gia_ban');

    // Nếu có upload ảnh mới
    if ($request->hasFile('hinh_anh_chinh')) {
        $image = $request->file('hinh_anh_chinh');
        $imageName = time().'_'.$image->getClientOriginalName();
        $image->move(public_path('images/products'), $imageName);

        $product->hinh_anh_chinh = $imageName;
    }

    $product->save();

    return redirect()->route('products.edit', $product->id)->with('success', 'Cập nhật thành công!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Xoá thành công!');
    }

    public function index()
    {
        $products = Product::all();
        return view('admin.index', compact('products'));
    }


}



