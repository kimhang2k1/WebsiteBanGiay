<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryManagementController extends Controller
{
    public function getCategoryManagement(Request $request)
    {
        $informationCategory = DB::table('nhomsanpham')->where('IDNhomSP', '=', $request->IDNhomSP)->get();
        $category = DB::table('nhomsanpham')->get();

        $allCategory = DB::table('nhomsanpham')->orderBy('IDNhomSP', 'DESC')->get();
        return view('/Admin/CategoryManagement')->with('category', $category)->with('allCategory', $allCategory)->with('informationCategory', $informationCategory);
    }

    public function getSearchCategory(Request $request)
    {
        $searchByCategory = DB::table('nhomsanpham')->whereRaw("TenNhom LIKE '%" . $request->Search . "%' OR IDNhomSP LIKE '%" . $request->Search . "%'")
            ->get();
        return view('/Admin/component/CategoryProduct')->with('category', $searchByCategory);
    }
    public function addCategory(Request $request)
    {
        $category = DB::table('nhomsanpham')->orderBy('IDNhomSP', 'DESC')->limit(1)->get();
        $string = $category[0]->IDNhomSP;
        $data = explode('NSP', $string);
        $IDSanPham = $data[1];
        $IDSanPham++;
        CategoryProduct::create('NSP0000' . $IDSanPham, $request->TenNhom);
        $category = DB::table('nhomsanpham')->get();
        return view('/Admin/component/CategoryProduct')->with('category', $category);
    }
    public function getFormCategory(Request $request)
    {
        $informationCategory = DB::table('nhomsanpham')->where('IDNhomSP', '=', $request->IDNhomSP)->get();


        return view('/Admin/component/FormEditCategoryProduct')->with('informationCategory', $informationCategory);
    }
    public function editCategory(Request $request)
    {
        DB::update("update nhomsanpham set TenNhom = ? where IDNhomSP = ?", [$request->TenNhom, $request->IDNhomSP]);
        $category = DB::table('nhomsanpham')->get();
        return view('/Admin/component/CategoryProduct')->with('category', $category);
    }
}