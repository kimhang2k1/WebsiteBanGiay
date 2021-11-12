<?php

namespace App\Http\Controllers\User;

use App\Models\Address;
use App\Http\Controllers\Controller;
use App\Models\AddressDefault;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    public function getDistrict(Request $request)
    {
        $district = DB::table('quanhuyen')->where('IDThanhPho', '=', $request->IDThanhPho)->get();
        $view = "";
        foreach ($district as $key => $value) {
            $view .= '<option class="tab-district w-full hover:bg-gray-300 " id="' . $value->IDQuan . 'district" value = "' . $value->IDQuan . '" onclick="getCommune(' . $value->IDQuan . ')">' . $value->TenQuan . '</option>';
        }
        return $view;
    }
    public function getCommune(Request $request)
    {
        $commune = DB::table('xa')->where('IDQuan', '=', $request->IDQuan)->get();
        $view = "";
        foreach ($commune as $key => $value) {
            $view .= '<option class="tab_commune w-full hover:bg-gray-300" id="' . $value->IDXa . 'commune"  value = "' . $value->IDXa . '"  onclick="getValue(' . $value->IDXa . ')">' . $value->TenXa . '</option>';
        }
        return $view;
    }

    public function addAddressCustomer(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'HoTen' => array('regex:/^([a-zA-ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i'),
                'SDT' => array('regex:((09|03|07|08|05)+([0-9]{8})\b)'),
                'SoNha' => array('required')
            ],
            $message =
                [
                    'HoTen.regex' => 'Vui lòng điền họ và tên',
                    'SDT.regex' => 'Số điện thoại không đúng định dạng',
                    'SoNha.required' => 'Số nhà không được để trống',
                ]
        );
        if ($validator->fails())
            return response()->json(['error' => $validator->errors()->all()]);
        else {
            $id = Session::get('user')[0]->IDTaiKhoan;
            Address::create(
                $request->HoTen,
                $request->SDT,
                $request->IDXa,
                $request->IDQuan,
                $request->IDThanhPho,
                $request->SoNha,
                $id
            );
            $addressOfCustomer = DB::table('diachikhachhang')->leftJOIN('tinhthanhpho', 'diachikhachhang.IDThanhPho', '=', 'tinhthanhpho.IDThanhPho')
                ->leftJOIN('quanhuyen', 'diachikhachhang.IDQuan', '=', 'quanhuyen.IDQuan')
                ->leftJOIN('xa', 'diachikhachhang.IDXa', '=', 'xa.IDXa')->where('IDTaiKhoan', '=', $id)->get();
            return response()->json([
                'view' => "" . view('/User/component/Address/delivery_address')->with('address', $addressOfCustomer)
            ]);
        }
    }
    public function getAddressDefault(Request $request)
    {
        $id = Session::get('user')[0]->IDTaiKhoan;
        $default  = AddressDefault::where('IDTaiKhoan', '=', $id)->get();
        if (count($default) > 0) {
            DB::update('update diachimacdinh set IDDiaChi = "' . $request->IDDiaChi . '" where IDTaiKhoan = "' . $id . '" ');

            $addressDefault = AddressDefault::JOIN('diachikhachhang', 'diachikhachhang.IDDiaChi', '=', 'diachimacdinh.IDDiaChi')
                ->JOIN('tinhthanhpho', 'diachikhachhang.IDThanhPho', '=', 'tinhthanhpho.IDThanhPho')
                ->JOIN('quanhuyen', 'diachikhachhang.IDQuan', '=', 'quanhuyen.IDQuan')
                ->JOIN('xa', 'diachikhachhang.IDXa', '=', 'xa.IDXa')->where('diachimacdinh.IDTaiKhoan', '=', $id)->get();

            return view('/User/component/Address/default_address')->with('addressDefault', $addressDefault);
        } else {
            AddressDefault::create($request->IDDiaChi, $id, 'Mặc Định');
            $addressDefault = AddressDefault::JOIN('diachikhachhang', 'diachikhachhang.IDDiaChi', '=', 'diachimacdinh.IDDiaChi')
                ->JOIN('tinhthanhpho', 'diachikhachhang.IDThanhPho', '=', 'tinhthanhpho.IDThanhPho')
                ->JOIN('quanhuyen', 'diachikhachhang.IDQuan', '=', 'quanhuyen.IDQuan')
                ->JOIN('xa', 'diachikhachhang.IDXa', '=', 'xa.IDXa')->where('diachimacdinh.IDTaiKhoan', '=', $id)->get();

            return view('/User/component/Address/default_address')->with('addressDefault', $addressDefault);
        }
    }
    public function editAddressCustomer(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'HoTen' => array('regex:/^([a-zA-ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i'),
                'SDT' => array('regex:((09|03|07|08|05)+([0-9]{8})\b)'),
                'SoNha' => array('required')
            ],
            $message =
                [
                    'HoTen.regex' => 'Vui lòng điền họ và tên',
                    'SDT.regex' => 'Số điện thoại không đúng định dạng',
                    'SoNha.required' => 'Số nhà không được để trống',
                ]
        );
        if ($validator->fails())
            return response()->json(['error' => $validator->errors()->all()]);
        else {
            $id = Session::get('user')[0]->IDTaiKhoan;

            DB::update(
                "update diachikhachhang set HoTen = ?, SDT = ?, SoNha = ?, IDThanhPho = ?, IDQuan = ?, IDXa =? where IDTaiKhoan = ? and IDDiaChi = ?",
                [$request->HoTen, $request->SDT, $request->SoNha, $request->IDThanhPho, $request->IDQuan, $request->IDXa, $id, $request->IDDiaChi]
            );
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
            return response()->json([
                'view' => "" . view('/User/component/Address/allAddress')->with('addressOfCustomer', $addressOfCustomer)->with('addressDefault', $addressDefault)
            ]);
        }
    }
}