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
            $now = Carbon::now('Asia/Ho_Chi_Minh')->endOfDay()->toDateTimeString();
        
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
        
            // Xóa dữ liệu thống kê cũ trong khoảng thời gian được chọn
            ThongKe::whereBetween('ngaydat', [$subdays, $now])->delete();
        
            // Lấy tất cả đơn hàng đã xử lý trong khoảng thời gian
            $orders = DB::table('don_hang')
                ->where('tinh_trang', 1)
                ->whereBetween('ngay_dat_hang', [$subdays, $now])
                ->get();
        
            $thongKeData = [];
        
            foreach ($orders as $order) {
                $orderDate = Carbon::parse($order->ngay_dat_hang)->toDateString();
        
                $tongDoanhThu = DB::table('chi_tiet_don_hang')
                    ->where('ma_don_hang', $order->ma_don_hang)
                    ->select(DB::raw('SUM(so_luong * don_gia) as tong'))
                    ->value('tong') ?? 0;
        
                if (!isset($thongKeData[$orderDate])) {
                    $thongKeData[$orderDate] = [
                        'ngaydat' => $orderDate,
                        'donhang' => 1,
                        'doanhthu' => $tongDoanhThu,
                    ];
                } else {
                    $thongKeData[$orderDate]['donhang'] += 1;
                    $thongKeData[$orderDate]['doanhthu'] += $tongDoanhThu;
                }
            }
        
            // Lưu thống kê mới vào bảng thong_ke
            foreach ($thongKeData as $item) {
                ThongKe::create($item);
            }
        
            // Trả dữ liệu về cho biểu đồ
            $chartData = ThongKe::whereBetween('ngaydat', [$subdays, $now])
                ->orderBy('ngaydat')
                ->get(['ngaydat as date', 'donhang as order', 'doanhthu as sales']);
        
            return response()->json($chartData);
        }
        
         public function delete($id)
        {
            DB::table('don_hang')->where('ma_don_hang', $id)->delete();
            return redirect()->route('orders.list')->with('success', 'Đơn hàng đã được xóa thành công!');
        }
        public function updateOrderStatus($id)
        {
            DB::table('don_hang')
                ->where('ma_don_hang', $id)
                ->update(['tinh_trang' => 0]); // chuyển về "đã giao"
        
            return redirect()->route('orders.list')->with('success', 'Cập nhật trạng thái đơn hàng thành công.');
        }
        
        public function orderDetail($id)
        {
            $order = DB::table('don_hang')
                ->join('users', 'don_hang.user_id', '=', 'users.id')
                ->where('don_hang.ma_don_hang', $id)
                ->select(
                    'don_hang.*',
                    'users.name as ten_khach_hang',
                    'users.phone',
                    'users.dia_chi'
                )
                ->first();

            $orderDetails = DB::table('chi_tiet_don_hang')
                ->join('san_pham', 'chi_tiet_don_hang.product_id', '=', 'san_pham.id')
                ->where('chi_tiet_don_hang.ma_don_hang', $id)
                ->select(
                    'san_pham.ten_san_pham',
                    'san_pham.gia_ban',
                    'chi_tiet_don_hang.so_luong'
                )
                ->get();

            return view('admin.order_detail', compact('order', 'orderDetails'));
        }

        public function listCustomers()
        {
            $customers = DB::table('users')
                ->leftJoin('don_hang', 'users.id', '=', 'don_hang.user_id')
                ->where('users.usertype', '0')
                ->select(
                    'users.id',
                    'users.name',
                    'users.email',
                    'users.phone',
                    'users.dia_chi',
                    'users.created_at',
                    DB::raw('COUNT(don_hang.ma_don_hang) as so_don_hang')
                )
                ->groupBy('users.id', 'users.name', 'users.email', 'users.phone', 'users.dia_chi', 'users.created_at')
                ->orderByDesc('users.created_at')
                ->get();
        
            return view('admin.customers', compact('customers'));
        }
        public function listOrdersByUser($user_id)
        {
            $user = DB::table('users')->where('id', $user_id)->first();

            $orders = DB::table('don_hang')
                ->where('user_id', $user_id)
                ->orderByDesc('ngay_dat_hang')
                ->get();

            return view('admin.customer_orders', compact('orders', 'user'));
        }

               
    
}
