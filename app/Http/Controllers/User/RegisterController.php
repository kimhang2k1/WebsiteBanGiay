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
            'email' => array('required', 'email', 'unique:taikhoan'),
            'password' => array('required', 'min:6'),
            'password_clone' => array('required', 'same:password'),
        ], $message = [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật Khẩu có độ dài ít nhất 6 ký tự',
            'password_clone.required' => 'Mật Khẩu không được để trống',
            'password_clone.same' => 'Mật Khẩu không khớp',



        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return view('register')->withErrors($errors)->with('register', $request->all());
        } else {
            $kh = DB::select('SELECT IDTaiKhoan FROM taikhoan ORDER BY IDTaiKhoan DESC');
            if (count($kh) > 0) {
                $string = $kh[0]->IDTaiKhoan;
                $customer = explode('KH', $string);
                $number = $customer[1];
                $number++;
                TaiKhoan::create(
                    'KH' . $number,
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
                    $request->email,
                    md5($request->password)
                );
                return redirect()->to('login')->send();
            }
        }
    }
}