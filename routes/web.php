<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StoreController;
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
Route::get('/redirect',[HomeController::class,'redirect'] );

Route::get('/','App\Http\Controllers\HomeController@new');// Hiển thị section sản phẩm mới nhất trong trang chủ

Route::get('/category/{categoryId}', [CategoryController::class, 'show']);  // Hiển thị sản phẩm theo danh mục

Route::get('/allproducts','App\Http\Controllers\StoreController@all'); //Hiển thị tất cả sản phẩm

Route::get('/quick-view/{id}', [ProductsController::class, 'quickView']);//Hiển thị Quick View

Route::get('/store', [StoreController::class, 'index'])->name('pages.allproducts');  //này chưa có viết hàm





Route::get('/giaodiendangnhap','App\Http\Controllers\ProductsController@giaodiendangnhap'); //route hiện giao diện đăng nhập


Route::get('/home/products/{id}','App\Http\Controllers\ProductsController@products')->name('products');// hiện chi tiết sản phẩm


Route::get('/order','App\Http\Controllers\ProductsController@order')->name('order');

Route::post('/cart/add','App\Http\Controllers\ProductsController@cartadd')->name('cartadd');

Route::post('/cart/delete','App\Http\Controllers\ProductsController@cartdelete')->name('cartdelete');

Route::post('/order/create','App\Http\Controllers\ProductsController@ordercreate')
->middleware('auth')->name('ordercreate');

Route::get('/san-pham', [CategoryController::class, 'filterByLoai']);



