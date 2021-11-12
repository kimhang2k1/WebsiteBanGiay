<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function getData(Request $request)
    {
        $product_new = DB::table('sanpham')->skip(0)->take(8)->orderBy('IDSanPham', 'DESC')->get();
        $product_trend = DB::table('sanpham')->skip(8)->take(14)->get();
        $category = DB::table('nhomsanpham')->limit(3)->get();
        return view('/User/Main/index')->with('product_new', $product_new)->with('product_trend', $product_trend)->with('category', $category);
    }
}