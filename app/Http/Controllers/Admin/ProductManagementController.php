<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductManagementController extends Controller
{
    public function getProductManagement(Request $request)
    {
        $product = DB::table('sanpham')->JOIN('nhomsanpham', 'sanpham.IDNhomSP', '=', 'nhomsanpham.IDNhomSP')
            ->JOIN('thuonghieu', 'sanpham.IDThuongHieu', '=', 'thuonghieu.IDThuongHieu')->orderby('sanpham.IDSanPham', 'ASC')->get();
        $category = DB::table('nhomsanpham')->limit(3)->get();
        $brand = DB::table('thuonghieu')->get();

        $allProduct = DB::table('sanpham')->orderBy('IDSanPham', 'DESC')->get();
        return view('/Admin/ProductManagement')->with('product', $product)->with('category', $category)->with('brand', $brand)
            ->with('allProduct', $allProduct);
    }

    public function getSearchProductInShop(Request $request)
    {
        if ($request->SearchProduct != NULL && $request->IDNhomSP != NULL) {

            $searchByProduct = DB::table('sanpham')->JOIN('nhomsanpham', 'sanpham.IDNhomSP', '=', 'nhomsanpham.IDNhomSP')
                ->JOIN('thuonghieu', 'sanpham.IDThuongHieu', '=', 'thuonghieu.IDThuongHieu')
                ->whereRaw("TenSP LIKE '%" . $request->SearchProduct . "%' OR IDSanPham LIKE '%" . $request->SearchProduct . "%'")
                ->where('sanpham.IDNhomSP', '=', $request->IDNhomSP)->orderby('sanpham.IDSanPham', 'ASC')->get();

            return view('/Admin/Component/AllProductInShop')->with('product', $searchByProduct);
        } else if ($request->SearchProduct != NULL && $request->IDNhomSP == NULL) {

            $searchByProduct = DB::table('sanpham')->JOIN('nhomsanpham', 'sanpham.IDNhomSP', '=', 'nhomsanpham.IDNhomSP')
                ->JOIN('thuonghieu', 'sanpham.IDThuongHieu', '=', 'thuonghieu.IDThuongHieu')
                ->whereRaw("TenSP LIKE '%" . $request->SearchProduct . "%' OR IDSanPham LIKE '%" . $request->SearchProduct . "%'")
                ->orderby('sanpham.IDSanPham', 'ASC')
                ->get();

            return view('/Admin/Component/AllProductInShop')->with('product', $searchByProduct);
        } else if ($request->SearchProduct == NULL && $request->IDNhomSP != NULL) {

            $searchByProduct = DB::table('sanpham')->JOIN('nhomsanpham', 'sanpham.IDNhomSP', '=', 'nhomsanpham.IDNhomSP')
                ->JOIN('thuonghieu', 'sanpham.IDThuongHieu', '=', 'thuonghieu.IDThuongHieu')
                ->where('sanpham.IDNhomSP', '=', $request->IDNhomSP)->orderby('sanpham.IDSanPham', 'ASC')->get();
            return view('/Admin/Component/AllProductInShop')->with('product', $searchByProduct);
        } else if ($request->SearchProduct == NULL && $request->IDNhomSP == NULL) {

            $searchByProduct = DB::table('sanpham')->JOIN('nhomsanpham', 'sanpham.IDNhomSP', '=', 'nhomsanpham.IDNhomSP')
                ->JOIN('thuonghieu', 'sanpham.IDThuongHieu', '=', 'thuonghieu.IDThuongHieu')
                ->orderby('sanpham.IDSanPham', 'ASC')
                ->get();
            return view('/Admin/Component/AllProductInShop')->with('product', $searchByProduct);
        }
    }

    public function addProduct(Request $request)
    {
        // if ($request->has('fileImage')) {
        //     $file_path = "public/img";
        //     $images = $request->file('fileImage');
        //     $file = $images->getClientOriginalName();
        //     $path = $request->file('fileImage')->storeAs($file_path, $file);

        //     $all_product = DB::table('sanpham')->orderBy('IDSanPham', 'DESC')->limit(1)->get();
        //     $string = $all_product[0]->IDSanPham;
        //     $data = explode('SP', $string);
        //     $number = $data[1];
        //     $number++;
        //     Product::create(
        //         'SP0000' . $number,
        //         $request->nameProduct,
        //         $request->price,
        //         $file,
        //         $request->ckeditor,
        //         $request->groupProduct,
        //         $request->thuongHieu,
        //         'Còn Hàng'
        //     );
        // }

        echo $request->ckeditor;
        // $product = DB::table('sanpham')->JOIN('nhomsanpham', 'sanpham.IDNhomSP', '=', 'nhomsanpham.IDNhomSP')
        //     ->JOIN('thuonghieu', 'sanpham.IDThuongHieu', '=', 'thuonghieu.IDThuongHieu')->orderby('sanpham.IDSanPham', 'ASC')->get();
        // return view('Admin/component/AllProductInShop')->with('product', $product);
    }
}