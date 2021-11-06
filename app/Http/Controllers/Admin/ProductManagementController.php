<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductManagementController extends Controller
{
    public function getProductManagement(Request $request)
    {
        $product = DB::table('sanpham')->JOIN('nhomsanpham', 'sanpham.IDNhomSP', '=', 'nhomsanpham.IDNhomSP')
            ->JOIN('thuonghieu', 'sanpham.IDThuongHieu', '=', 'thuonghieu.IDThuongHieu')->get();
        $category = DB::table('nhomsanpham')->get();
        return view('/Admin/ProductManagement')->with('product', $product)->with('category', $category);
    }
}