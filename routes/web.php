<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WishlistController;

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


Route::get('/redirect',[HomeController::class,'redirect'] );

Route::get('/', [HomeController::class, 'index'])->name('index');  // Hiển thị sản phẩm mới nhất
Route::get('/category/{categoryId}', [CategoryController::class, 'show']);  // Hiển thị sản phẩm theo danh mục

Route::get('/giaodiendangnhap','App\Http\Controllers\ProductsController@giaodiendangnhap'); //route hiện giao diện đăng nhập

Route::get('/home/chitiet/{id}','App\Http\Controllers\ProductsController@chitiet')->name('chitiet');// hiện chi tiết sản phẩm

Route::get('/home/products/{id}','App\Http\Controllers\ProductsController@products')->name('products');// hiện chi tiết sản phẩm


Route::get('/order','App\Http\Controllers\ProductsController@order')->name('order');

Route::post('/cart/add','App\Http\Controllers\ProductsController@cartadd')->name('cartadd');

Route::post('/cart/delete','App\Http\Controllers\ProductsController@cartdelete')->name('cartdelete');

Route::post('/order/create','App\Http\Controllers\ProductsController@ordercreate')
->middleware('auth')->name('ordercreate');


//Footer
Route::get('/lichsuht','App\Http\Controllers\ProductsController@lichsuht')->name('lichsuht');
Route::get('/thuonghieu','App\Http\Controllers\ProductsController@thuonghieu')->name('thuonghieu');
Route::get('/csdoitra_baohanh','App\Http\Controllers\ProductsController@csdoitra_baohanh')->name('csdoitra_baohanh');
Route::get('/tuvan','App\Http\Controllers\ProductsController@tuvan')->name('tuvan');

//wishlist
// Thêm sản phẩm vào danh sách yêu thích
Route::post('/wishlist/add', 'App\Http\Controllers\WishlistController@store')
->middleware('auth')->name('wishlistadd');

// Hiển thị danh sách sản phẩm yêu thích
Route::get('/wishlist', 'App\Http\Controllers\WishlistController@index')->name('wishlist');

// Xóa sản phẩm khỏi danh sách yêu thích
Route::post('/wishlist/delete', 'App\Http\Controllers\WishlistController@delete')->name('wishlistdelete');
