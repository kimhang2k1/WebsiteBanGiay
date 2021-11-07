<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagementController extends Controller
{
    public function getAccountManagement(Request $request)
    {
        $account = DB::table('taikhoan')->get();
        return view('/Admin/AccountManagement')->with('account', $account);
    }

    public function getSearchAccount(Request $request)
    {
        $searchByAccount = DB::table('taikhoan')->whereRaw("IDTaiKhoan LIKE '%" . $request->Search . "%'  ")->get();
        return view('/Admin/component/AccountCustomer')->with('account', $searchByAccount);
    }


    public function getCustomerInformationManagement(Request $request)
    {
        $customer = DB::table('diachikhachhang')
            ->JOIN('tinhthanhpho', 'diachikhachhang.IDThanhPho', '=', 'tinhthanhpho.IDThanhPho')
            ->JOIN('quanhuyen', 'diachikhachhang.IDQuan', '=', 'quanhuyen.IDQuan')
            ->JOIN('xa', 'diachikhachhang.IDXa', '=', 'xa.IDXa')->get();
        return view('/Admin/CustomerManagement')->with('customer', $customer);
    }

    public function getSearchCustomer(Request $request)
    {
        $searchByCustomer = DB::table('diachikhachhang')
            ->JOIN('tinhthanhpho', 'diachikhachhang.IDThanhPho', '=', 'tinhthanhpho.IDThanhPho')
            ->JOIN('quanhuyen', 'diachikhachhang.IDQuan', '=', 'quanhuyen.IDQuan')
            ->JOIN('xa', 'diachikhachhang.IDXa', '=', 'xa.IDXa')->whereRaw("diachikhachhang.IDTaiKhoan LIKE '%" . $request->Search . "%'  ")->get();
        return view('/Admin/component/Customer')->with('customer', $searchByCustomer);
    }
}