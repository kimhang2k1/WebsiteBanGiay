<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardManagementController extends Controller
{
    public function getDashboard(Request $request)
    {
        $totalProduct = DB::table('sanpham')->get();

        $billToday = DonHang::whereRaw("CAST(NgayDatHang AS DATE) = ? ", [date('Y-m-d')])->get();

        $totalDate = DB::table('chitietdonhang')->JOIN('donhang', 'donhang.IDDonHang', 'chitietdonhang.IDDonHang')
            ->whereRaw("CAST(NgayDatHang AS DATE) = ? ", [date('Y-m-d')])
            ->sum('ThanhTien');

        $customer = DB::table('taikhoan')->get();

        $check = DB::table('donhang')->select(DB::raw('Loai, COUNT(donhang.IDTrangThai) as count'))
            ->JOIN('trangthaidonhang', 'trangthaidonhang.IDTrangThai', '=', 'donhang.IDTrangThai')->groupBy('trangthaidonhang.Loai')->get();
        $data = [];
        foreach ($check as $row) {
            $data['label'][] = $row->Loai;
            $data['data'][] = (int) $row->count;
        }
        return view('/Admin/PageMain/Home')->with('totalProduct', $totalProduct)->with('billToday', $billToday)
            ->with('totalDate', $totalDate)->with('customer', $customer)->with('data', json_encode($data));
    }
}