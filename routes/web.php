<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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


/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/redirect',[HomeController::class,'redirect'] );

Route::get('/','App\Http\Controllers\ProductsController@home'); //route hiện trang chủ

Route::get('/giaodiendangnhap','App\Http\Controllers\ProductsController@giaodiendangnhap'); //route hiện giao diện đăng nhập

Route::get('/home/chitiet/{id}','App\Http\Controllers\ProductsController@chitiet');// hiện chi tiết sản phẩm

Route::get('/order','App\Http\Controllers\ProductsController@order')->name('order');

Route::post('/cart/add','App\Http\Controllers\ProductsController@cartadd')->name('cartadd');

Route::post('/cart/delete','App\Http\Controllers\ProductsController@cartdelete')->name('cartdelete');

Route::post('/order/create','App\Http\Controllers\ProductsController@ordercreate')
->middleware('auth')->name('ordercreate');


