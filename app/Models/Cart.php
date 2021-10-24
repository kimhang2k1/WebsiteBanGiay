<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'giohang';
    protected $fillable = [
        'STT',
        'IDTaiKhoan',
        'IDSanPham',
        'SoLuong',
        'IDSize'
    ];
    public static function create(
        $IDTaiKhoan,
        $IDSanPham,
        $SoLuong,
        $IDSize
    ) {
        $c = new Cart();
        $c->IDTaiKhoan = $IDTaiKhoan;
        $c->IDSanPham = $IDSanPham;
        $c->SoLuong = $SoLuong;
        $c->IDSize = $IDSize;

        $c->save();
    }
    public $timestamps = false;
}