<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AccountController extends Controller
{
    public function accountpanel()
{
    $userId = Auth::id(); 
    $user = DB::table("users")->where("id", $userId)->first();

    $startDate = Carbon::createFromFormat('Y-m-d', '2025-01-01');

    // Lấy danh sách đơn hàng từ 01/01/2025
    $orders = DB::table("don_hang")
        ->where("user_id", $userId)
        ->where("ngay_dat_hang", '>=', $startDate)
        ->pluck("ma_don_hang");

    $orderCount = $orders->count();

    $totalAmount = 0;
    if ($orders->isNotEmpty()) {
        $details = DB::table("chi_tiet_don_hang")
            ->whereIn('ma_don_hang', $orders)
            ->select(DB::raw('SUM(so_luong * don_gia) as total'))
            ->first();

        $totalAmount = $details->total ?? 0;
    }

    return view('pages.accountpanel', compact('user', 'orderCount', 'totalAmount'));
}


    function saveaccountinfo(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['nullable', 'string'],
            'dia_chi'=> ['nullable', 'string', 'max:255'],
            'profile_photo_path'=> ['nullable', 'image']
        ]);
        $id = $request->input('id');
        $data["name"] = $request->input("name");
        $data["phone"] = $request->input("phone");
        $data["email"] = $request->input("email");
        $data["dia_chi"] = $request->input("dia_chi");


        if ($request->hasFile("profile_photo_path")) {
            //Tạo tên file bằng cách lấy id của người dùng ghép với phần mở rộng của hình ảnh
            $fileName = Auth::user()->id . '.' . $request->file('profile_photo_path')->extension();
            //File được lưu vào thư mục storage/app/public/profile
            $request->file('profile_photo_path')->storeAs('public/profile', $fileName);
            $data['profile_photo_path'] = $fileName;
        }
        DB::table("users")->where("id", $id)->update($data);
        return redirect()->route('taikhoan')->with('status', 'Cập nhật thành công');
    }

    function taikhoan()
    {
        $user = DB::table("users")->whereRaw("id=?", [Auth::user()->id])->first();
        return view("pages.taikhoan", compact("user"));
    }

    function lichsumuahang()
    {
        $user = DB::table("users")->whereRaw("id=?", [Auth::user()->id])->first();
        return view("pages.lichsumuahang", compact("user"));
    }




}

?>