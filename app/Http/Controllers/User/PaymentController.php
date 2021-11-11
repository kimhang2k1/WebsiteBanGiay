<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AddressDefault;
use App\Models\DonHang;
use App\Models\OrderDetail;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function getProductInCart(Request $request)
    {
        $id = Session::get('user')[0]->IDTaiKhoan;

        $payment = DB::table('giohang')->JOIN('sanpham', 'sanpham.IDSanPham', '=', 'giohang.IDSanPham')
            ->JOIN('size', 'size.IDSize', '=', 'giohang.IDSize')->where('IDTaiKhoan', '=', $id)->get();

        $city = DB::table('tinhthanhpho')->get();

        $district = DB::table('quanhuyen')->get();

        $commune = DB::table('xa')->where('IDQuan', '=', NULL)->get();
        $addressDefault = AddressDefault::JOIN('diachikhachhang', 'diachikhachhang.IDDiaChi', '=', 'diachimacdinh.IDDiaChi')
            ->JOIN('tinhthanhpho', 'diachikhachhang.IDThanhPho', '=', 'tinhthanhpho.IDThanhPho')
            ->JOIN('quanhuyen', 'diachikhachhang.IDQuan', '=', 'quanhuyen.IDQuan')
            ->JOIN('xa', 'diachikhachhang.IDXa', '=', 'xa.IDXa')->where('diachimacdinh.IDTaiKhoan', '=', $id)->get();
        $addressOfCustomer = DB::table('diachikhachhang')->leftJOIN('tinhthanhpho', 'diachikhachhang.IDThanhPho', '=', 'tinhthanhpho.IDThanhPho')
            ->leftJOIN('quanhuyen', 'diachikhachhang.IDQuan', '=', 'quanhuyen.IDQuan')
            ->leftJOIN('xa', 'diachikhachhang.IDXa', '=', 'xa.IDXa')->where('IDTaiKhoan', "=", $id)->get();





        return view('payment')->with('payment', $payment)->with('city', $city)->with('district', $district)->with('commune', $commune)->with('address', $addressOfCustomer)
            ->with('addressDefault', $addressDefault);
    }
    public function orderProduct(Request $request)
    {
        $id = Session::get('user')[0]->IDTaiKhoan;
        $currentDateTime = date('Y-m-d H:i:s');
        $datetime = new DateTime($currentDateTime);
        $datetime->modify('+2 day');
        $order = DB::select("SELECT IDDonHang FROM donhang ORDER BY IDDonHang DESC");
        $addressDefault = DB::table('diachimacdinh')->where('IDTaiKhoan', '=', $id)->get();
        if (count($order) > 0) {
            $string = $order[0]->IDDonHang;
            $data = explode('DH', $string);
            $number = $data[1];
            $number++;
            DonHang::create('DH' . $number, $id, $currentDateTime, $datetime->format('Y-m-d H:i:s'), $addressDefault[0]->IDDiaChi, '1');
        } else {
            $string = 'DH10000000';
            $data = explode('DH', $string);
            $number = $data[1];
            $number++;
            DonHang::create('DH' . $number, $id, $currentDateTime, $datetime->format('Y-m-d H:i:s'), $addressDefault[0]->IDDiaChi, '1');
        }
        $cart = DB::table('giohang')->JOIN('sanpham', 'sanpham.IDSanPham', '=', 'giohang.IDSanPham')->JOIN('size', 'size.IDSize', '=', 'giohang.IDSize')->where('IDTaiKhoan', '=', $id)->get();
        foreach ($cart as $key => $value) {
            $cart[$key] = DB::table('giohang')->JOIN('sanpham', 'sanpham.IDSanPham', '=', 'giohang.IDSanPham')->JOIN('size', 'size.IDSize', '=', 'giohang.IDSize')->where('IDTaiKhoan', '=', $id)->where('giohang.STT', '=', $value->STT)->get()[0];
            $dh = DB::select("SELECT IDDonHang FROM donhang WHERE IDTaiKhoan = '" . $id . "' ORDER BY IDDonHang DESC");
            OrderDetail::create(
                $dh[0]->IDDonHang,
                $cart[$key]->IDSanPham,
                $cart[$key]->IDSize,
                $cart[$key]->GiaSP,
                $cart[$key]->SoLuong,
                $cart[$key]->GiaSP * $cart[$key]->SoLuong,
                'Thành Công'
            );
            DB::table('giohang')->where('IDTaiKhoan', '=', $id)->where('STT', '=', $value->STT)->delete();
        }
        return redirect()->to('/profile')->send();
    }
}