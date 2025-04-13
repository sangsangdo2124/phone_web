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
            WishlistItem::create([
                'user_id' => auth()->id(), // hoặc 1 nếu đang test
                'san_pham_id' => $request->id
            ]);

            return redirect()->route('wishlist'); 
        }


        /*public function add(Request $request)
        {
            $id = $request->input('id');
            $wishlist = Session::get('wishlist', []);

            if (!in_array($id, $wishlist)) {
                $wishlist[] = $id;
                Session::put('wishlist', $wishlist);
            }

            return redirect()->back()->with('success', 'Đã thêm vào yêu thích');
        }*/

        // Xóa sản phẩm khỏi danh sách yêu thích
        public function delete(Request $request)
        {
            $id = $request->input('id');
            $wishlist = Session::get('wishlist', []);

            if (($key = array_search($id, $wishlist)) !== false) {
                unset($wishlist[$key]);
                Session::put('wishlist', $wishlist);
            }

            return redirect()->back()->with('success', 'Đã xóa khỏi yêu thích');
        }
    }

