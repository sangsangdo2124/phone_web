<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
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
Route::get('/redirect', [HomeController::class, 'redirect'])->name('redirect');

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

// Định nghĩa route cho trang quản lý
Route::get('/redirect/products','App\Http\Controllers\AdminController@listproducts')->name('listproducts');
<<<<<<< HEAD
Route::get('/redirect/products/insert','App\Http\Controllers\AdminController@insert')->name('products.insert');
// Hiển thị form sửa
Route::get('admin/products/{id}/edit', 'App\Http\Controllers\ProductsController@edit')->name('products.edit');

// Xử lý cập nhật sản phẩm
Route::put('admin/products/{id}', 'App\Http\Controllers\ProductsController@update')->name('products.update');

// Xử lý xoá sản phẩm
Route::delete('admin/products/{id}', 'App\Http\Controllers\ProductsController@destroy')->name('products.destroy');
Route::get('admin/products', 'App\Http\Controllers\ProductsController@index')->name('products.index');


=======

Route::get('/product/insert', [AdminController::class, 'productinsert'])->name('productinsert');

Route::post('/product/save/{action}', [AdminController::class, 'productSave'])->name('productsave');

Route::post('/load-thongke', [AdminController::class, 'layDuLieuThongKe'])->name('load.dashboard');
    
Route::get('/orders', [AdminController::class, 'listOrders'])->name('orders.list');

Route::post('/orders/update', [AdminController::class, 'update'])->name('orders.update');
Route::get('/orders/delete/{id}', [AdminController::class, 'delete'])->name('orders.delete');
Route::put('/orders/update-status/{id}', [AdminController::class, 'updateOrderStatus'])->name('orders.updateStatus');
Route::get('/orders/{id}/detail', [AdminController::class, 'orderDetail'])->name('orders.detail');

    Route::get('/customers', [AdminController::class, 'listCustomers'])->name('customers');

    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
>>>>>>> a41143562ace7ad993c67f8e10e3586aaaf98624
