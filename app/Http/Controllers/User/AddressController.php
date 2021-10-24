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
            $view .= '<div class="tab-district w-full hover:bg-gray-300 " id="' . $value->IDQuan . 'district" onclick="getCommune(' . $value->IDQuan . ')">' . $value->TenQuan . '</div>';
        }
        return $view;
    }
    public function getCommune(Request $request)
    {
        $commune = DB::table('xa')->where('IDQuan', '=', $request->IDQuan)->get();
        $view = "";
        foreach ($commune as $key => $value) {
            $view .= '<div class="tab_commune w-full hover:bg-gray-300" id="' . $value->IDXa . 'commune" onclick="getValue(' . $value->IDXa . ')">' . $value->TenXa . '</div>';
        }
        return $view;
    }

    public function addAddressCustomer(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'customer_name' => array('required', 'regex:/^([a-zA-ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i'),
                'customer_phone' => array('required', 'regex:((09|03|07|08|05)+([0-9]{8})\b)'),
                'apartment_number' => array('required')
            ],
            $message =
                [
                    'customer_name.required' => 'Họ Tên không đươc để trống',
                    'customer_name.regex' => 'Họ Tên không đúng định dạng',
                    'customer_phone.required' => 'Số điện thoại không được để trống',
                    'customer_phone.regex' => 'Số điện thoại không đúng định dạng',
                    'apartment_number.required' => 'Số Nhà không được để trống',
                ]
        );
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        } else {
            $id = Session::get('user')[0]->IDTaiKhoan;
            Address::create(
                $request->customer_name,
                $request->customer_phone,
                $request->IDXa,
                $request->IDQuan,
                $request->IDThanhPho,
                $request->SoNha,
                $id
            );
        }
    }
}