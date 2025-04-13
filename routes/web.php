<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\AdminController;

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

Route::get('/','App\Http\Controllers\HomeController@index');// Hiển thị section sản phẩm mới nhất trong trang chủ

Route::get('/category/{categoryId}', [CategoryController::class, 'show']);  // Hiển thị sản phẩm theo danh mục

Route::get('/allproducts','App\Http\Controllers\StoreController@all')->name('allproducts'); //Hiển thị tất cả sản phẩm

Route::get('/quick-view/{id}', [ProductsController::class, 'quickView']);//Hiển thị Quick View

Route::get('/store', 'App\Http\Controllers\StoreController@index')->name('store.index');

Route::get('/store', [StoreController::class, 'index'])->name('store.index');  //này chưa có viết hàm



Route::get('/thanks', function () {
    return view('pages.thanks');
})->name('thanks');



Route::get('/giaodiendangnhap','App\Http\Controllers\ProductsController@giaodiendangnhap'); //route hiện giao diện đăng nhập


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




// Định nghĩa route cho trang quản lý
Route::get('/redirect/products','App\Http\Controllers\AdminController@listproducts')->name('listproducts');
Route::get('/redirect/products/insert','App\Http\Controllers\AdminController@insert')->name('products.insert');
// Hiển thị form sửa
Route::get('admin/products/{id}/edit', 'App\Http\Controllers\ProductsController@edit')->name('products.edit');

// Xử lý cập nhật sản phẩm
Route::put('admin/products/{id}', 'App\Http\Controllers\ProductsController@update')->name('products.update');

// Xử lý xoá sản phẩm
Route::delete('admin/products/{id}', 'App\Http\Controllers\ProductsController@destroy')->name('products.destroy');
Route::get('admin/products', 'App\Http\Controllers\ProductsController@index')->name('products.index');


