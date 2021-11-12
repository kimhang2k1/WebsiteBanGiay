<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function createAccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hoTen' => array('required', 'regex:/^([a-zA-ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i'),
            'sdt' => array('required', 'regex:((09|03|07|08|05)+([0-9]{8})\b)'),
            'email' => array('required', 'email', 'unique:taikhoan'),
            'password' => array('required', 'min:6'),
            'password_clone' => array('required', 'same:password'),
        ], $message = [
            'hoTen.required' => 'Họ Tên không được để trống',
            'sdt.required' => 'Số điện thoại không được để trống',
            'hoTen.regex' => 'Họ Tên không đúng định dạng',
            'sdt.regex' => 'Số điện thoại không đúng định dạng',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật Khẩu có độ dài ít nhất 6 ký tự',
            'password_clone.required' => 'Mật Khẩu không được để trống',
            'password_clone.same' => 'Mật Khẩu không khớp',



        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return view('/User/Main/register')->withErrors($errors)->with('register', $request->all());
        } else {
            $kh = DB::select('SELECT IDTaiKhoan FROM taikhoan ORDER BY IDTaiKhoan DESC');
            if (count($kh) > 0) {
                $string = $kh[0]->IDTaiKhoan;
                $customer = explode('KH', $string);
                $number = $customer[1];
                $number++;
                TaiKhoan::create(
                    'KH' . $number,
                    $request->hoTen,
                    $request->sdt,
                    $request->email,
                    md5($request->password)
                );
                return redirect()->to('login')->send();
            } else {
                $string = "KH1000000";
                $customer = explode('KH', $string);
                $number = $customer[1];
                $number++;
                TaiKhoan::create(
                    'KH' . $number,
                    $request->hoTen,
                    $request->sdt,
                    $request->email,
                    md5($request->password)
                );
                return redirect()->to('login')->send();
            }
        }
    }
}