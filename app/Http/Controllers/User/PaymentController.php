<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function getProductInCart(Request $request)
    {
        $id = Session::get('user')[0]->IDTaiKhoan;

        $payment = DB::table('giohang')->JOIN('sanpham', 'sanpham.IDSanPham', '=', 'giohang.IDSanPham')
            ->JOIN('size', 'size.IDSize', '=', 'giohang.IDSize')->where('IDTaiKhoan', '=', $id)->get();

        $city = DB::table('tinhthanhpho')->get();

        $district = DB::table('quanhuyen')->get();

        $commune = DB::table('xa')->where('IDQuan', '=', NULL)->get();

        return view('payment')->with('payment', $payment)->with('city', $city)->with('district', $district)->with('commune', $commune);
    }
}