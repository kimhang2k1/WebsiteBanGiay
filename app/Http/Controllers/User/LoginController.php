<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function getAccount(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => array('required'),
                'password' => array('required')
            ],
            $message = [
                'email.required' => 'Email không được để trống',
                'password.required' => 'Mật khẩu không được để trống'
            ]
        );
        if ($validator->fails()) {
            $errors = $validator->errors();
            return view('/User/Main/login')->withErrors($errors)->with('login', $request->all());
        } else {
            $tk = TaiKhoan::where('Email', '=', $request->email)->where('MatKhau', '=', md5($request->password))->get();
            $check1 = TaiKhoan::where('Email', '=', $request->email)->get();
            $check2 = TaiKhoan::where('MatKhau', '=', md5($request->password))->get();
            if (count($check1) == 0) {
                Session::flash('status1', 'Email không đúng');
                return view('/User/Main/login')->with('login', $request->all());
            } else if (count($check2) == 0) {
                Session::flash('status2', 'Mật khẩu không đúng');
                return view('/User/Main/login')->with('login', $request->all());
            } else if (count($tk) != 0) {
                Session::put('user', $tk);
                return redirect()->to('home')->send();
            }
        }
    }
}