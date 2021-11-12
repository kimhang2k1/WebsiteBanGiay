<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchProductController extends Controller
{
    public function getSearchProduct(Request $request)
    {
        $product = DB::table('sanpham')->JOIN('thuonghieu', 'thuonghieu.IDThuongHieu', '=', 'sanpham.IDThuongHieu')->whereRaw("TenSP LIKE '%" . $request->Search . "%'")->limit(3)->get();
        return view('/User/component/Product/SearchProduct')->with('product', $product);
    }
    public function getInputSearch(Request $request)
    {
        $brand = DB::table('thuonghieu')->get();
        $category = DB::table('nhomsanpham')->limit(3)->get();
        $product = DB::table('sanpham')->JOIN('thuonghieu', 'thuonghieu.IDThuongHieu', '=', 'sanpham.IDThuongHieu')->whereRaw("TenSP LIKE '%" . $request->search . "%'")->get();
        return view('/User/Main/product')->with('productbyID', $product)->with('category', $category)->with('brand', $brand);
    }
}