<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderManagementController extends Controller
{
    public function getOrderManagement(Request $request)
    {
        $order = DB::table('donhang')->JOIN('chitietdonhang', 'donhang.IDDonHang', '=', 'chitietdonhang.IDDonHang')
            ->JOIN('sanpham', 'sanpham.IDSanPham', '=', 'chitietdonhang.IDSanPham')
            ->JOIN('diachikhachhang', 'donhang.IDDiaChi', '=', 'diachikhachhang.IDDiaChi')
            ->JOIN('size', 'chitietdonhang.IDSize', '=', 'size.IDSize')
            ->JOIN('tinhthanhpho', 'diachikhachhang.IDThanhPho', '=', 'tinhthanhpho.IDThanhPho')
            ->JOIN('quanhuyen', 'diachikhachhang.IDQuan', '=', 'quanhuyen.IDQuan')
            ->JOIN('xa', 'diachikhachhang.IDXa', '=', 'xa.IDXa')->get();

        return view('/Admin/OrderManagement')->with('order', $order);
    }

    public function getSearchOrder(Request $request)
    {
        if ($request->Search != NULL) {
            $searchBYOrder = DB::table('donhang')->JOIN('chitietdonhang', 'donhang.IDDonHang', '=', 'chitietdonhang.IDDonHang')
                ->JOIN('sanpham', 'sanpham.IDSanPham', '=', 'chitietdonhang.IDSanPham')
                ->JOIN('diachikhachhang', 'donhang.IDDiaChi', '=', 'diachikhachhang.IDDiaChi')
                ->JOIN('size', 'chitietdonhang.IDSize', '=', 'size.IDSize')
                ->JOIN('tinhthanhpho', 'diachikhachhang.IDThanhPho', '=', 'tinhthanhpho.IDThanhPho')
                ->JOIN('quanhuyen', 'diachikhachhang.IDQuan', '=', 'quanhuyen.IDQuan')
                ->JOIN('xa', 'diachikhachhang.IDXa', '=', 'xa.IDXa')->whereRaw("donhang.IDDonHang LIKE '%" . $request->Search . "%'")->get();

            return view('/Admin/component/AllOrderCustomer')->with('order', $searchBYOrder);
        } else {
            $searchBYOrder = DB::table('donhang')->JOIN('chitietdonhang', 'donhang.IDDonHang', '=', 'chitietdonhang.IDDonHang')
                ->JOIN('sanpham', 'sanpham.IDSanPham', '=', 'chitietdonhang.IDSanPham')
                ->JOIN('diachikhachhang', 'donhang.IDDiaChi', '=', 'diachikhachhang.IDDiaChi')
                ->JOIN('size', 'chitietdonhang.IDSize', '=', 'size.IDSize')
                ->JOIN('tinhthanhpho', 'diachikhachhang.IDThanhPho', '=', 'tinhthanhpho.IDThanhPho')
                ->JOIN('quanhuyen', 'diachikhachhang.IDQuan', '=', 'quanhuyen.IDQuan')
                ->JOIN('xa', 'diachikhachhang.IDXa', '=', 'xa.IDXa')->get();

            return view('/Admin/component/AllOrderCustomer')->with('order', $searchBYOrder);
        }
    }
}