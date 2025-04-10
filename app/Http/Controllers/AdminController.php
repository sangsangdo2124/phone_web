<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ThongKe;
use App\Models\OrderId;
use Carbon\Carbon;
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
                'is_new' => ['required', 'in:0,1'],
            ]);
    
            $data = $request->except('_token');
            $data['is_new'] = $request->input('is_new') == '1' ? 1 : 0;
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


        public function layDuLieuThongKe(Request $request)
        {
            $thoigian = $request->input('thoigian', '');
            $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    
            switch ($thoigian) {
                case '7ngay':
                    $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
                    break;
                case '28ngay':
                    $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(28)->toDateString();
                    break;
                case '90ngay':
                    $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(90)->toDateString();
                    break;
                case '365ngay':
                default:
                    $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
                    break;
            }
            // Lấy danh sách đơn hàng đã xử lý trong khoảng thời gian
            $orders = DB::table('don_hang')
                ->where('tinh_trang', 1)
                ->whereBetween('ngay_dat_hang', [$subdays, $now])
                ->select('ma_don_hang', DB::raw('DATE(ngay_dat_hang) as ngaydat'))
                ->get();
    
            foreach ($orders as $order) {
                $orderId = $order->ma_don_hang;
                $ngaydat = $order->ngaydat;
    
                // Nếu chưa thống kê đơn này
                if (!OrderId::where('order_id', $orderId)->exists()) {
                    // Tính tổng doanh thu của đơn đó
                    $doanhthu = DB::table('chi_tiet_don_hang')
                        ->where('ma_don_hang', $orderId)
                        ->select(DB::raw('SUM(so_luong * don_gia) as tong'))
                        ->value('tong');
    
                    $thongke = ThongKe::firstOrNew(['ngaydat' => $ngaydat]);
                    $thongke->donhang = ($thongke->donhang ?? 0) + 1;
                    $thongke->doanhthu = ($thongke->doanhthu ?? 0) + $doanhthu;
                    $thongke->save();
    
                    OrderId::create(['order_id' => $orderId]);
                }
            }
    
            // Trả dữ liệu về biểu đồ
            $chartData = ThongKe::whereBetween('ngaydat', [$subdays, $now])
                ->orderBy('ngaydat')
                ->get(['ngaydat as date', 'donhang as order', 'doanhthu as sales']);
    
            return response()->json($chartData);
        }
}
