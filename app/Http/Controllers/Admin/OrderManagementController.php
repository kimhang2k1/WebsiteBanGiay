<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderManagementController extends Controller
{
    public function getOrderManagement(Request $request)
    {
        $order = DB::table('donhang')->selectRaw("DISTINCT(donhang.IDDonHang),HoTen, SDT, SoNha, TenXa, TenQuan, TenThanhPho, NgayDatHang, donhang.IDTrangThai, trangthaidonhang.Loai")
            ->leftJOIN('chitietdonhang', 'donhang.IDDonHang', '=', 'chitietdonhang.IDDonHang')
            ->JOIN('diachikhachhang', 'donhang.IDDiaChi', '=', 'diachikhachhang.IDDiaChi')
            ->JOIN('tinhthanhpho', 'diachikhachhang.IDThanhPho', '=', 'tinhthanhpho.IDThanhPho')
            ->JOIN('quanhuyen', 'diachikhachhang.IDQuan', '=', 'quanhuyen.IDQuan')
            ->JOIN('xa', 'diachikhachhang.IDXa', '=', 'xa.IDXa')
            ->JOIN('trangthaidonhang', 'trangthaidonhang.IDTrangThai', '=', 'donhang.IDTrangThai')->get();
        $status = DB::table('trangthaidonhang')->get();
        return view('/Admin/OrderManagement')->with('order', $order)->with('status', $status);
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
    public function updateOrder(Request $request)
    {

        DB::update("update donhang set IDTrangThai = ? where IDDonHang = ? ", [$request->Status, $request->IDDonHang]);
        $order = DB::table('donhang')->selectRaw("DISTINCT(donhang.IDDonHang),HoTen, SDT, SoNha, TenXa, TenQuan, TenThanhPho, NgayDatHang, donhang.IDTrangThai, trangthaidonhang.Loai")
            ->leftJOIN('chitietdonhang', 'donhang.IDDonHang', '=', 'chitietdonhang.IDDonHang')
            ->JOIN('diachikhachhang', 'donhang.IDDiaChi', '=', 'diachikhachhang.IDDiaChi')
            ->JOIN('tinhthanhpho', 'diachikhachhang.IDThanhPho', '=', 'tinhthanhpho.IDThanhPho')
            ->JOIN('quanhuyen', 'diachikhachhang.IDQuan', '=', 'quanhuyen.IDQuan')
            ->JOIN('xa', 'diachikhachhang.IDXa', '=', 'xa.IDXa')
            ->JOIN('trangthaidonhang', 'trangthaidonhang.IDTrangThai', '=', 'donhang.IDTrangThai')->get();
        $status = DB::table('trangthaidonhang')->get();
        return view('/Admin/component/AllOrderCustomer')->with('order', $order)->with('status', $status);
    }
    public function getInformationDetailOrder(Request $request)
    {
        $inforOrder =  DB::table('chitietdonhang')->JOIN('donhang', 'donhang.IDDonHang', '=', 'chitietdonhang.IDDonHang')
            ->leftJOIN('diachikhachhang', 'donhang.IDDiaChi', '=', 'diachikhachhang.IDDiaChi')
            ->leftJOIN('tinhthanhpho', 'diachikhachhang.IDThanhPho', '=', 'tinhthanhpho.IDThanhPho')
            ->leftJOIN('quanhuyen', 'diachikhachhang.IDQuan', '=', 'quanhuyen.IDQuan')
            ->leftJOIN('xa', 'diachikhachhang.IDXa', '=', 'xa.IDXa')
            ->where('donhang.IDDonHang', '=', $request->IDDonHang)->limit(1)->get();

        $detailOrder = DB::table('chitietdonhang')->JOIN('donhang', 'donhang.IDDonHang', '=', 'chitietdonhang.IDDonHang')
            ->JOIN('sanpham', 'sanpham.IDSanPham', '=', 'chitietdonhang.IDSanPham')
            ->JOIN('size', 'chitietdonhang.IDSize', '=', 'size.IDSize')
            ->JOIN('trangthaidonhang', 'trangthaidonhang.IDTrangThai', '=', 'donhang.IDTrangThai')->where('donhang.IDDonHang', '=', $request->IDDonHang)->get();
        $status = DB::table('trangthaidonhang')->get();
        return view('/Admin/component/DetailOrderCustomer')->with('inforOrder', $inforOrder)->with('detailOrder', $detailOrder)->with('status', $status);
    }
}