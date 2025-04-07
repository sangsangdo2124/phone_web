<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;

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


Route::get('/redirect',[HomeController::class,'redirect'] ) -> name('redirect');

Route::get('/', [HomeController::class, 'index'])->name('index');  // Hiển thị sản phẩm mới nhất
Route::get('/category/{categoryId}', [CategoryController::class, 'show']);  // Hiển thị sản phẩm theo danh mục

Route::get('/giaodiendangnhap','App\Http\Controllers\ProductsController@giaodiendangnhap'); //route hiện giao diện đăng nhập

//Route::get('/home/chitiet/{id}','App\Http\Controllers\ProductsController@chitiet');// hiện chi tiết sản phẩm

Route::get('/home/products/{id}','App\Http\Controllers\ProductsController@products')->name('products');// hiện chi tiết sản phẩm


Route::get('/order','App\Http\Controllers\ProductsController@order')->name('order');

Route::post('/cart/add','App\Http\Controllers\ProductsController@cartadd')->name('cartadd');

Route::post('/cart/delete','App\Http\Controllers\ProductsController@cartdelete')->name('cartdelete');

Route::post('/order/create','App\Http\Controllers\ProductsController@ordercreate')
->middleware('auth')->name('ordercreate');

Route::get('/cart/count','App\Http\Controllers\ProductsController@cartCount')->name('cart.count');

Route::get('/checkout','App\Http\Controllers\ProductsController@checkout')->name('checkout');

Route::post('/placeorder','App\Http\Controllers\ProductsController@placeorder')->name('placeorder');

Route::get('/thankyou','App\Http\Controllers\ProductsController@thankyou')->name('thankyou');

Route::get('/accountpanel','App\Http\Controllers\AccountController@accountpanel')->middleware('auth')->name('accountpanel');
Route::get('/taikhoan','App\Http\Controllers\AccountController@taikhoan')->middleware('auth')->name('taikhoan');

Route::post('/saveaccountinfo','App\Http\Controllers\AccountController@saveaccountinfo')
->middleware('auth')->name('saveinfo');

Route::get('/lichsumuahang','App\Http\Controllers\AccountController@lichsumuahang')->middleware('auth')->name('lichsumuahang');




