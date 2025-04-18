<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\AdminController;

//master
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


//SANG SANG

Route::get('/redirect',[HomeController::class,'redirect'] )->name('redirect');

Route::get('/','App\Http\Controllers\HomeController@new');// Hiển thị section sản phẩm mới nhất trong trang chủ

Route::get('/category/{categoryId}', [CategoryController::class, 'show']);  // Hiển thị sản phẩm theo danh mục

Route::get('/allproducts','App\Http\Controllers\StoreController@all')->name('allproducts'); //Hiển thị tất cả sản phẩm

Route::get('/quick-view/{id}', [ProductsController::class, 'quickView']);//Hiển thị Quick View

// menu_tim_kiem
Route::get('/store', [StoreController::class, 'index'])->name('pages.allproducts');  //này chưa có viết hàm

//Route::get('/store', 'App\Http\Controllers\StoreController@index')->name('store.index');

//Route::get('/store', [StoreController::class, 'index'])->name('store.index');  //này chưa có viết hàm


Route::get('/thanks', function () {
    return view('pages.thanks');
})->name('thanks');



Route::get('/giaodiendangnhap','App\Http\Controllers\ProductsController@giaodiendangnhap'); //route hiện giao diện đăng nhập

//Lệ
Route::get('/home/chitiet/{id}','App\Http\Controllers\ProductsController@chitiet')->name('chitiet');// hiện chi tiế

Route::get('/home/products/{id}','App\Http\Controllers\ProductsController@products')->name('products');// hiện chi tiết sản phẩm



Route::get('/order','App\Http\Controllers\ProductsController@order')->middleware('auth')->name('order');

Route::post('/cart/add','App\Http\Controllers\ProductsController@cartadd')->middleware('auth')->name('cartadd');

Route::post('/cart/delete','App\Http\Controllers\ProductsController@cartdelete')->middleware('auth')->name('cartdelete');

Route::post('/order/create','App\Http\Controllers\ProductsController@ordercreate')->middleware('auth')
->name('ordercreate');

Route::post('/Muangay', [ProductsController::class, 'Muangay'])->middleware('auth')->name('Muangay');




Route::get('/cart/count','App\Http\Controllers\ProductsController@cartCount')->middleware('auth')->name('cart.count');

Route::get('/checkout','App\Http\Controllers\ProductsController@checkout')->middleware('auth')->name('checkout');

Route::post('/placeorder','App\Http\Controllers\ProductsController@placeorder')->middleware('auth')->name('placeorder');

Route::get('/thankyou','App\Http\Controllers\ProductsController@thankyou')->middleware('auth')->name('thankyou');

Route::get('/accountpanel','App\Http\Controllers\AccountController@accountpanel')->middleware('auth')->name('accountpanel');
Route::get('/taikhoan','App\Http\Controllers\AccountController@taikhoan')->middleware('auth')->name('taikhoan');

Route::post('/saveaccountinfo','App\Http\Controllers\AccountController@saveaccountinfo')
->middleware('auth')->name('saveinfo');

Route::get('/lichsumuahang','App\Http\Controllers\AccountController@lichsumuahang')->middleware('auth')->name('lichsumuahang');

Route::get('/san-pham', [CategoryController::class, 'filterByLoai']);



// Định nghĩa route cho trang quản lý
Route::get('/redirect/products','App\Http\Controllers\AdminController@listproducts')->name('listproducts');

Route::get('/product/insert', [AdminController::class, 'productinsert'])->name('productinsert');

Route::post('/product/save/{action}', [AdminController::class, 'productSave'])->name('productsave');

Route::post('/load-thongke', [AdminController::class, 'layDuLieuThongKe'])->name('load.dashboard');
    
Route::get('/orders', [AdminController::class, 'listOrders'])->name('orders.list');

Route::post('/orders/update', [AdminController::class, 'update'])->name('orders.update');
Route::get('/orders/delete/{id}', [AdminController::class, 'delete'])->name('orders.delete');
Route::put('/orders/update-status/{id}', [AdminController::class, 'updateOrderStatus'])->name('orders.updateStatus');
Route::get('/orders/{id}/detail', [AdminController::class, 'orderDetail'])->name('orders.detail');

Route::get('/customers', [AdminController::class, 'listCustomers'])->name('customers.list');
Route::get('/customers/orders/{user_id}', [AdminController::class, 'listOrdersByUser'])->name('customers.orders');

Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
// Hiển thị form sửa
Route::get('admin/products/{id}/edit', 'App\Http\Controllers\ProductsController@edit')->name('products.edit');

// Xử lý cập nhật sản phẩm
Route::put('admin/products/{id}', 'App\Http\Controllers\ProductsController@update')->name('products.update');

// Xử lý xoá sản phẩm
Route::delete('admin/products/{id}', 'App\Http\Controllers\ProductsController@destroy')->name('products.destroy');
Route::get('admin/products', 'App\Http\Controllers\ProductsController@index')->name('products.index');


//Footer
Route::get('/lichsuht','App\Http\Controllers\ProductsController@lichsuht')->name('lichsuht');
Route::get('/thuonghieu','App\Http\Controllers\ProductsController@thuonghieu')->name('thuonghieu');
Route::get('/csdoitra_baohanh','App\Http\Controllers\ProductsController@csdoitra_baohanh')->name('csdoitra_baohanh');
Route::get('/tuvan','App\Http\Controllers\ProductsController@tuvan')->name('tuvan');



//wishlist

// Thêm sản phẩm vào danh sách yêu thích
Route::post('/wishlist/add', 'App\Http\Controllers\WishlistController@store')
->middleware('auth')->name('wishlistadd');

Route::get('/wishlist/count','App\Http\Controllers\WishlistController@wishlistCount')->middleware('auth')->name('wishlist.count');

// Hiển thị danh sách sản phẩm yêu thích
Route::get('/wishlist', 'App\Http\Controllers\WishlistController@index')->name('wishlist');

// Xóa sản phẩm khỏi danh sách yêu thích
Route::post('/wishlist/delete', 'App\Http\Controllers\WishlistController@delete')->name('wishlistdelete');

