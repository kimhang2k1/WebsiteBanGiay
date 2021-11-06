<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function getLogin(Request $request)
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
            return view('/Admin/Login')->withErrors($errors)->with('login', $request->all());
        } else {
            $account = DB::table('admin')->where('Email', '=', $request->email)->where('MatKhau', '=', $request->password)->get();
            $check1 = DB::table('admin')->where('Email', '=', $request->email)->get();
            $check2 = DB::table('admin')->where('MatKhau', '=', $request->password)->get();
            if (count($check1) == 0) {
                Session::flash('status1', 'Email không đúng');
                return view('/Admin/Login')->with('login', $request->all());
            } else if (count($check2) == 0) {
                Session::flash('status2', 'Mật khẩu không đúng');
                return view('/Admin/Login')->with('login', $request->all());
            } else if (count($account) != 0) {
                Session::put('admin', $account);
                return view('/Admin/Home')->with('account', $account);
            }
        }
    }
}