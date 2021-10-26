<?php

namespace App\Http\Controllers\User;

use App\Models\Address;
use App\Http\Controllers\Controller;
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
                'view' => "" . view('/component/delivery_address')->with('address', $addressOfCustomer)
            ]);
        }
    }
}