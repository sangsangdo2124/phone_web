<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\WishlistItem;
    use App\Models\Product;

    use Illuminate\Support\Facades\Session;


    class WishlistController extends Controller
    {
        // Hiển thị danh sách yêu thích
        public function index()
    {
        $wishlist = WishlistItem::where('user_id', auth()->id())->with('sanpham')->get()->map(function($item)
        {
            return $item->sanpham; // Lấy trực tiếp đối tượng sản phẩm
        })->filter(); // Loại bỏ null nếu có sản phẩm bị xoá

        return view('pages.wishlist', compact('wishlist'));
    }


        // Thêm sản phẩm vào danh sách yêu thích
        public function store(Request $request)
        {

            $userId = auth()->id();
            $productId = $request->id;

            // Kiểm tra nếu đã tồn tại thì không thêm nữa
            $exists = WishlistItem::where('user_id', $userId)
                ->where('san_pham_id', $productId)
                ->exists();

            if (!$exists) {
                WishlistItem::create([
                    'user_id' => $userId,
                    'san_pham_id' => $productId
                ]);
            }

            return redirect()->route('wishlist')->with('success', 'Đã thêm vào danh sách yêu thích!');
        }


        

        // Xóa sản phẩm khỏi danh sách yêu thích
        public function delete(Request $request)
        {

            $userId = auth()->id();
            $productId = $request->id;

            $id = $request->input('id');
            $wishlist = Session::get('wishlist', []);

            WishlistItem::where('user_id', $userId)
            ->where('san_pham_id', $productId)
            ->delete();

            return redirect()->back()->with('success', 'Đã xóa khỏi yêu thích');
        }
    }

