<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        if (session()->has('user')) {
            $id = Session::get('user')[0]->IDTaiKhoan;
            $cart = DB::table('giohang')->where('giohang.IDSanPham', '=', $request->IDSanPham)->where('giohang.IDSize', '=', $request->IDSize)->where('IDTaiKhoan', '=', $id)->get();
            if (count($cart) <= 0) {
                Cart::create($id, $request->IDSanPham, $request->Number, $request->IDSize);
                $cart = DB::table('giohang')->JOIN('sanpham', 'sanpham.IDSanPham', '=', 'giohang.IDSanPham')->JOIN('size', 'size.IDSize', '=', 'giohang.IDSize')->where("IDTaiKhoan", '=', $id)->get();
                return response()->json([
                    'view' => " " . view('/component/box_cart')->with('gh', $cart[0]),
                    'num' => count(Cart::where('IDTaiKhoan', '=', $id)->get())
                ]);
            } else {
                DB::update("update giohang set SoLuong ='" . $request->Number . "' + SoLuong where IDSanPham = '" . $request->IDSanPham . "' and IDSize = '" . $request->IDSize . "' and IDTaiKhoan = '" . $id . "'  ");
            }
        }
    }
    public function getCart(Request $request)
    {
        if (session()->has('user')) {
            $id = Session::get('user')[0]->IDTaiKhoan;
            $shoppingCart = DB::table('giohang')->JOIN('sanpham', 'sanpham.IDSanPham', '=', 'giohang.IDSanPham')
                ->JOIN('size', 'size.IDSize', '=', 'giohang.IDSize')->where('IDTaiKhoan', '=', $id)->get();
            return view('cart')->with('shoppingCart', $shoppingCart);
        }
    }
    public function changeToCart(Request $request)
    {
        $id = Session::get('user')[0]->IDTaiKhoan;
        DB::update("update giohang set SoLuong = '" . $request->num . "' where IDTaiKhoan = '" . $id . "' and STT = '" . $request->STT . "'");
    }

    public function deleteCart(Request $request)
    {

        $cart = DB::table('giohang')->where('IDTaiKhoan', '=', Session::get('user')[0]->IDTaiKhoan)->get();
        if (count($cart) <= 1) {
            DB::table('giohang')->where('STT', '=', $request->STT)->where('IDTaiKhoan', '=', Session::get('user')[0]->IDTaiKhoan)->delete();
            return view('/component/form-not-cart');
        } else {
            DB::table('giohang')->where('STT', '=', $request->STT)->where('IDTaiKhoan', '=', Session::get('user')[0]->IDTaiKhoan)->delete();
            return '';
        }
    }
}