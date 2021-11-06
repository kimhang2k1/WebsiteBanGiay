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

Route::get('/post-comment-product', [User\ProductDetailController::class, 'postComment']);

// Tìm kiếm sản phẩm

Route::get('/search-product', [User\SearchProductController::class, 'getSearchProduct']);

Route::get('/search', [User\SearchProductController::class, 'getInputSearch']);

// Giỏ Hàng
Route::get('/cart', [User\CartController::class, 'getCart']);

Route::get('/add-to-cart', [User\CartController::class, 'addToCart']);

Route::get('/change-price', [User\CartController::class, 'changeToCart']);

Route::get('/delete-to-cart', [User\CartController::class, 'deleteCart']);


// Thanh Toán

Route::get('/payment', [User\PaymentController::class, 'getProductInCart']);

Route::get('/get-district', [User\AddressController::class, 'getDistrict']);

Route::get('/get-commune', [User\AddressController::class, 'getCommune']);

Route::get('/add-address-customer', [User\AddressController::class, 'addAddressCustomer']);

Route::get('/get-address-default', [User\AddressController::class, 'getAddressDefault']);

Route::get('/check-out', [User\PaymentController::class, 'orderProduct']);

// Profile 

Route::get('/profile', [User\ProfileController::class, 'getProfile']);

Route::get('/get-information-customer', [User\ProfileController::class, 'getInformationCustomer']);

Route::get('/edit-address-customer', [User\AddressController::class, 'editAddressCustomer']);

Route::get('/delete-address-customer', [User\ProfileController::class, 'deleteAddressCustomer']);

Route::get('/edit-information-customer', [User\ProfileController::class, 'editInformationCustomer']);

Route::post('/change-password-customer', [User\ProfileController::class, 'changePassword']);



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



// Admin

// Đăng Nhập

Route::get('/admin/login', function () {
    return view('/Admin/Login');
});

Route::get('/admin/home', function () {
    return view('/Admin/Home');
});
Route::post('/process-login', [Admin\LoginController::class, 'getLogin']);

// Quản lý

Route::get('/admin/product-management', [Admin\ProductManagementController::class, 'getProductManagement']);

Route::get('/admin/category-management', [Admin\CategoryManagementController::class, 'getCategoryManagement']);

Route::get('/admin/order-management', function () {
    return view('/Admin/OrderManagement');
});

Route::get('/admin/account-management', function () {
    return view('/Admin/AccountManagement');
});