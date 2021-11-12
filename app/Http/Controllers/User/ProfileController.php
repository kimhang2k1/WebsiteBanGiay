<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AddressDefault;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function getProfile(Request $request)
    {
        $id = Session::get('user')[0]->IDTaiKhoan;

        // hiển thị địa chỉ khách hàng

        $profile = DB::table('taikhoan')->where('IDTaiKhoan', '=', $id)->get();
        $addressDefault = AddressDefault::JOIN('diachikhachhang', 'diachikhachhang.IDDiaChi', '=', 'diachimacdinh.IDDiaChi')
            ->JOIN('tinhthanhpho', 'diachikhachhang.IDThanhPho', '=', 'tinhthanhpho.IDThanhPho')
            ->JOIN('quanhuyen', 'diachikhachhang.IDQuan', '=', 'quanhuyen.IDQuan')
            ->JOIN('xa', 'diachikhachhang.IDXa', '=', 'xa.IDXa')->where('diachimacdinh.IDTaiKhoan', '=', $id)
            ->get();

        $addressOfCustomer = DB::table('diachikhachhang')->leftJOIN('tinhthanhpho', 'diachikhachhang.IDThanhPho', '=', 'tinhthanhpho.IDThanhPho')
            ->leftJOIN('quanhuyen', 'diachikhachhang.IDQuan', '=', 'quanhuyen.IDQuan')
            ->leftJOIN('xa', 'diachikhachhang.IDXa', '=', 'xa.IDXa')
            ->whereRaw('diachikhachhang.IDTaiKhoan = "' . $id . '" and not IDDiaChi = "' . $addressDefault[0]->IDDiaChi . '"')
            ->get();

        $city = DB::table('tinhthanhpho')->get();

        $district = DB::table('quanhuyen')->get();

        $commune = DB::table('xa')->where('IDQuan', '=', NULL)->get();

        $infor = DB::table('diachikhachhang')->leftJOIN('tinhthanhpho', 'diachikhachhang.IDThanhPho', '=', 'tinhthanhpho.IDThanhPho')
            ->leftJOIN('quanhuyen', 'diachikhachhang.IDQuan', '=', 'quanhuyen.IDQuan')
            ->leftJOIN('xa', 'diachikhachhang.IDXa', '=', 'xa.IDXa')
            ->whereRaw('diachikhachhang.IDTaiKhoan = "' . $id . '" and IDDiaChi = "' . $request->IDDiaChi . '"')
            ->get();

        // hiển thị thông tin đơn hàng
        $orderCustomer = DB::table('donhang')->whereRaw("not donhang.IDTrangThai = 5 and IDTaiKhoan = '" . $id . "' ")->get();
        $orderCancel = DB::table('donhang')->whereRaw("donhang.IDTrangThai = 5 and IDTaiKhoan = '" . $id . "' ")->get();
        return view('/User/Main/profile')->with('addressOfCustomer', $addressOfCustomer)->with('addressDefault', $addressDefault)
            ->with('orderCustomer', $orderCustomer)->with('city', $city)->with('district', $district)->with('commune', $commune)
            ->with('infor', $infor)->with('profile', $profile)->with('orderCancel', $orderCancel);
    }

    public function getInformationCustomer(Request $request)
    {
        $id = Session::get('user')[0]->IDTaiKhoan;
        $infor = DB::table('diachikhachhang')->leftJOIN('tinhthanhpho', 'diachikhachhang.IDThanhPho', '=', 'tinhthanhpho.IDThanhPho')
            ->leftJOIN('quanhuyen', 'diachikhachhang.IDQuan', '=', 'quanhuyen.IDQuan')
            ->leftJOIN('xa', 'diachikhachhang.IDXa', '=', 'xa.IDXa')
            ->whereRaw('diachikhachhang.IDTaiKhoan = "' . $id . '" and IDDiaChi = "' . $request->IDDiaChi . '"')
            ->get();
        $city = DB::table('tinhthanhpho')->get();

        $district = DB::table('quanhuyen')->get();

        $commune = DB::table('xa')->where('IDQuan', '=', NULL)->get();
        return view('/User/component/Address/form_edit_address')->with('infor', $infor)->with('city', $city)->with('district', $district)->with('commune', $commune);
    }

    public function deleteAddressCustomer(Request $request)
    {
        $id = Session::get('user')[0]->IDTaiKhoan;
        $addressOfCustomer = DB::table('diachikhachhang')->where('IDTaiKhoan', '=', $id)->get();
        if (count($addressOfCustomer) <= 1) {
            DB::table('diachikhachhang')->where('IDTaiKhoan', '=', $id)->where('IDDiaChi', '=', $request->IDDiaChi)->delete();
            return view('/User/component/Address/NoAddress');
        } else {
            DB::table('diachikhachhang')->where('IDTaiKhoan', '=', $id)->where('IDDiaChi', '=', $request->IDDiaChi)->delete();
            return '';
        }
    }

    public function editInformationCustomer(Request $request)
    {
        $id = Session::get('user')[0]->IDTaiKhoan;
        DB::update('update taikhoan set Ten = ?, SoDienThoai = ?, Email = ? where IDTaiKhoan = ?', [$request->TenKH, $request->SDT, $request->Email, $id]);
        $profile = DB::table('taikhoan')->where('IDTaiKhoan', '=', $id)->get();
        return view('/User/component/Profile/Information')->with('profile', $profile);
    }

    public function changePassword(Request $request)
    {

        $id = Session::get('user')[0]->IDTaiKhoan;
        DB::update('update taikhoan set MatKhau = ? where IDTaiKhoan = ?', [md5($request->mkClone), $id]);
        Session::flush();
        return redirect()->to("login");
    }
    public function getInformationDetailProductOrder(Request $request)
    {
        $id = Session::get('user')[0]->IDTaiKhoan;
        $billCustomer =  DB::table('donhang')->where('IDTaiKhoan', '=', $id)->where('donhang.IDDonHang', '=', $request->IDDonHang)->get();
        return view('/User/component/Profile/ReviewDetailOrder')->with('billCustomer', $billCustomer);
    }
    public function cancelOrder(Request $request)
    {
        DB::update("update donhang set IDTrangThai = 5 where IDDonHang = ?", [$request->IDDonHang]);
        $id = Session::get('user')[0]->IDTaiKhoan;
        $orderCancel = DB::table('donhang')->where('IDTaiKhoan', '=', $id)->where('donhang.IDTrangThai', '=', '5')->get();

        return view('/User/component/Profile/OrderCustomerCancel')->with('orderCancel', $orderCancel);
    }
}