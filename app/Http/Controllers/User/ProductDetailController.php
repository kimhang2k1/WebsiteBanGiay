<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductDetailController extends Controller
{
    public function getProductDetail($id, $IDTH)
    {
        $product = DB::table('sanpham')->where('IDSanPham', '=', $id)->get();

        $size = DB::table('size')->get();

        $productSame = DB::table('sanpham')->whereRaw("not IDSanPham = '" . $id . "' and IDThuongHieu = '" . $IDTH . "'")->get();

        $category = DB::table('nhomsanpham')->limit(3)->get();

        $imageDetail = DB::table('hinhanhchitiet')->where('IDSanPham', '=', $id)->get();

        return view('product-detail')->with('product', $product)->with('productSame', $productSame)->with('category', $category)
            ->with('imageDetail', $imageDetail)->with('size', $size);
    }
}