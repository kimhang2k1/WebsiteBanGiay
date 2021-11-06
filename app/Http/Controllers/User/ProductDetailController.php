<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductDetailController extends Controller
{
    public function getProductDetail($id, $IDTH)
    {
        $product = DB::table('sanpham')->where('IDSanPham', '=', $id)->get();

        $size = DB::table('size')->get();

        $productSame = DB::table('sanpham')->whereRaw("not IDSanPham = '" . $id . "' and IDThuongHieu = '" . $IDTH . "'")->get();

        $category = DB::table('nhomsanpham')->limit(3)->get();

        $comment = DB::table('danhgiasanpham')->JOIN('taikhoan', 'taikhoan.IDTaiKhoan', '=', 'danhgiasanpham.IDTaiKhoan')->get();

        $imageDetail = DB::table('hinhanhchitiet')->where('IDSanPham', '=', $id)->get();

        return view('product-detail')->with('product', $product)->with('productSame', $productSame)->with('category', $category)
            ->with('imageDetail', $imageDetail)->with('size', $size)->with('comment', $comment);
    }

    public function postComment(Request $request)
    {
        $id = Session::get('user')[0]->IDTaiKhoan;
        $currentDateTime = date('Y-m-d H:i:s');
        $datetime = new DateTime($currentDateTime);
        Comment::create($request->IDSanPham, $id, $request->Comment, $datetime, $request->NumberStar);

        $comment = DB::table('danhgiasanpham')->JOIN('taikhoan', 'taikhoan.IDTaiKhoan', '=', 'danhgiasanpham.IDTaiKhoan')->get();
        return view('/component/Product/AllComment')->with('comment', $comment);
    }
}