<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
    use HasFactory;
    protected $table = 'taikhoan';
    protected $fillable = [
        'IDTaiKhoan',
        'Ten',
        'SoDienThoai',
        'Email',
        'MatKhau',
    ];
    public static function create(
        $IDTaiKhoan,
        $Ten,
        $SoDienThoai,
        $Email,
        $MatKhau
    ) {
        $tk = new TaiKhoan();
        $tk->IDTaiKhoan = $IDTaiKhoan;
        $tk->Ten = $Ten;
        $tk->SoDienThoai = $SoDienThoai;
        $tk->Email = $Email;
        $tk->MatKhau = $MatKhau;
        $tk->save();
    }
    public $timestamps = false;
}