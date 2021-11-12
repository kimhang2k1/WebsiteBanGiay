<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getProduct(Request $request)
    {
        $product = DB::table('sanpham')->get();
        $category = DB::table('nhomsanpham')->limit(3)->get();
        $brand = DB::table('thuonghieu')->get();
        return view('/User/Main/product')->with('productbyID', $product)->with('category', $category)->with('brand', $brand);
    }
    public function getProductById(Request $request)
    {
        $category = DB::table('nhomsanpham')->limit(3)->get();
        $brand = DB::table('thuonghieu')->get();
        $product = DB::table('sanpham')->where('IDNhomSP', '=', $request->IDNSP)->orWhere('IDNhomSP', '=', 'NSP00004')->get();
        return view('/User/Main/product')->with('productbyID', $product)->with('category', $category)->with('brand', $brand);
    }
    public function getProductByBrand(Request $request)
    {
        if ($request->IDNSP != NULL) {

            $productbyBrand = DB::table('sanpham')->where('IDThuongHieu', '=', $request->ID)->where('IDNhomSP', '=', $request->IDNSP)->get();
            return view('/User/component/Product/allProduct')->with('productbyID', $productbyBrand);
        } else {

            $productbyBrand = DB::table('sanpham')->where('IDThuongHieu', '=', $request->ID)->get();
            return view('/User/component/Product/allProduct')->with('productbyID', $productbyBrand);
        }
    }
    public function getProductbyCategory(Request $request)
    {
        if ($request->IDNSP == NULL) {
            $productByCategory = DB::table('sanpham')->where('IDNhomSP', '=', $request->id)->get();
            return view('/User/component/Product/allProduct')->with('productbyID', $productByCategory);
        } else {
            $productByCategory = DB::table('sanpham')->where('IDNhomSP', '=', $request->id)->get();
            return view('/User/component/Product/allProduct')->with('productbyID', $productByCategory);
        }
    }

    public function getProductByPrice(Request $request)
    {
        if ($request->IDNSP == NULL) {
            $priceFrom = explode("-", $request->price)[0];
            $priceTo = explode("-", $request->price)[1];
            $productByPrice = DB::table('sanpham')->whereRaw("GiaSP >= $priceFrom AND GiaSP <= $priceTo")->get();
            return view('/User/component/Product/allProduct')->with('productbyID', $productByPrice);
        } else {
            $priceFrom = explode("-", $request->price)[0];
            $priceTo = explode("-", $request->price)[1];
            $productByPrice = DB::table('sanpham')->whereRaw("GiaSP >= $priceFrom AND GiaSP <= $priceTo")->where('IDNhomSP', '=', $request->IDNSP)->get();
            return view('/User/component/Product/allProduct')->with('productbyID', $productByPrice);
        }
    }
    public function sortProduct(Request $request)
    {
        if ($request->IDNSP == NULL) {
            if ($request->Loai == 'Mới Nhất') {
                $sort = DB::table('sanpham')->orderBy('IDSanPham', 'DESC')->get();
                return view('/User/component/Product/allProduct')->with('productbyID', $sort);
            } else if ($request->Loai == 'ASC') {
                $sort = DB::table('sanpham')->orderBy('GiaSP', 'ASC')->get();
                return view('/User/component/Product/allProduct')->with('productbyID', $sort);
            } else if ($request->Loai == 'DESC') {
                $sort = DB::table('sanpham')->orderBy('GiaSP', 'DESC')->get();
                return view('/User/component/Product/allProduct')->with('productbyID', $sort);
            } else if ($request->Loai == 'A-Z') {
                $sort = DB::table('sanpham')->orderBy('TenSP', 'ASC')->get();
                return view('/User/component/Product/allProduct')->with('productbyID', $sort);
            } else  if ($request->Loai == 'Z-A') {
                $sort = DB::table('sanpham')->orderBy('TenSP', 'DESC')->get();
                return view('/User/component/Product/allProduct')->with('productbyID', $sort);
            }
        } else {
            if ($request->Loai == 'Mới Nhất') {
                $sort = DB::table('sanpham')->orderBy('IDSanPham', 'DESC')->where('IDNhomSP', '=', $request->IDNSP)->get();
                return view('/User/component/Product/allProduct')->with('productbyID', $sort);
            } else if ($request->Loai == 'ASC') {
                $sort = DB::table('sanpham')->orderBy('GiaSP', 'ASC')->where('IDNhomSP', '=', $request->IDNSP)->get();
                return view('/User/component/Product/allProduct')->with('productbyID', $sort);
            } else if ($request->Loai == 'DESC') {
                $sort = DB::table('sanpham')->orderBy('GiaSP', 'DESC')->where('IDNhomSP', '=', $request->IDNSP)->get();
                return view('/User/component/Product/allProduct')->with('productbyID', $sort);
            } else if ($request->Loai == 'A-Z') {
                $sort = DB::table('sanpham')->orderBy('TenSP', 'ASC')->where('IDNhomSP', '=', $request->IDNSP)->get();
                return view('/User/component/Product/allProduct')->with('productbyID', $sort);
            } else  if ($request->Loai == 'Z-A') {
                $sort = DB::table('sanpham')->orderBy('TenSP', 'DESC')->where('IDNhomSP', '=', $request->IDNSP)->get();
                return view('/User/component/Product/allProduct')->with('productbyID', $sort);
            }
        }
    }
}