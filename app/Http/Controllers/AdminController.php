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

        public function productinsert()
        {
            $phanloai = DB::table('phan_loai')->get();
            $hangsx = DB::table('nha_san_xuat')->get();
            $action = 'add';
    
            return view('admin.insert', compact('phanloai', 'hangsx', 'action'));
        }
    
        // Lưu sản phẩm (dùng chung cho thêm & sửa)
        public function productSave($action, Request $request)
        {
            $request->validate([
                'id' => ['required', 'string', 'max:50', 'unique:san_pham,id'],
                'ten_san_pham' => ['required', 'string', 'max:255'],
                'mo_ta' => ['nullable', 'string'],
                'gia_ban' => ['required', 'numeric'],
                'ton_kho' => ['required', 'integer'],
                'id_phan_loai' => ['required', 'exists:phan_loai,id'],
                'id_hang_sx' => ['required', 'exists:nha_san_xuat,id'],
                'hinh_anh_chinh' => ['nullable', 'image'],
            ]);
    
            $data = $request->except('_token');
    
            if ($action == 'edit') {
                $data = $request->except('_token', 'id');
            }
    
            // Xử lý hình ảnh
            if ($request->hasFile('hinh_anh_chinh')) {
                $file = $request->file('hinh_anh_chinh');
                $fileName = $request->input('ten_san_pham') . "_" . rand(100000, 999999) . '.' . $file->extension();
            
                // Lưu thẳng vào public/img
                $file->move(public_path('img'), $fileName);
            
                $data['hinh_anh_chinh'] = $fileName;
            }
            $message = "";
    
            if ($action == 'add') {
                DB::table('san_pham')->insert($data);
                $message = "Thêm sản phẩm thành công!";
            } elseif ($action == 'edit') {
                $id = $request->id;
                DB::table('san_pham')->where('id', $id)->update($data);
                $message = "Cập nhật sản phẩm thành công!";
            }
    
            return redirect()->route('listproducts')->with('status', $message);
        }
}
