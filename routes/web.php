<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\RegisterController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

// Trang chủ 
Route::get('/home', [User\HomeController::class, 'getData']);

// Sản phẩm
Route::get('/product', [User\ProductController::class, 'getProduct']);

Route::get('/product/{IDNSP}', [User\ProductController::class, 'getProductById']);

Route::get('/productbyBrand', [User\ProductController::class, 'getProductByBrand']);

Route::get('/productbyCategory', [User\ProductController::class, 'getProductbyCategory']);

Route::get('/productByPrice', [User\ProductController::class, 'getProductByPrice']);

Route::get('/sort', [User\ProductController::class, 'sortProduct']);

// Chi tiết sản phẩm
Route::get('/product_detail', function () {
    return view('product-detail');
});

Route::get('/product/product_detail/{id}&&{IDTH}', [User\ProductDetailController::class, 'getProductDetail']);

// Giỏ Hàng
Route::get('/cart', [User\CartController::class, 'getCart']);

Route::get('/add-to-cart', [User\CartController::class, 'addToCart']);

Route::get('/change-price', [User\CartController::class, 'changeToCart']);

Route::get('/delete-to-cart', [User\CartController::class, 'deleteCart']);


// Thanh Toán

Route::get('/payment', [User\PaymentController::class, 'getProductInCart']);

Route::get('/get-district', [User\AddressController::class, 'getDistrict']);

Route::get('/get-commune', [User\AddressController::class, 'getCommune']);
// Tài Khoản

//Đăng Nhập
Route::post('/handle-login', [User\LoginController::class, 'getAccount']);
Route::get('/login', function () {
    $category = DB::table('nhomsanpham')->limit(3)->get();
    return view('login')->with('category', $category);
});

// Đăng Xuất
Route::get('dangxuat', function () {
    Session::flush();
    return redirect()->to("home");
});
// Đăng ký
Route::post('/check-account', [User\RegisterController::class, 'createAccount']);
Route::get('/register', function () {
    return view('register');
});