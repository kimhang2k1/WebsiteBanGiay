<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'danhgiasanpham';
    protected $fillable = [
        'IDSanPham',
        'IDTaiKhoan',
        'NoiDung',
        'NgayBinhLuan',
        'SoSao',


    ];
    public static function create(
        $IDSanPham,
        $IDTaiKhoan,
        $NoiDung,
        $NgayBinhLuan,
        $SoSao,




    ) {
        $c = new Comment();
        $c->IDSanPham = $IDSanPham;
        $c->IDTaiKhoan = $IDTaiKhoan;
        $c->NoiDung = $NoiDung;
        $c->NgayBinhLuan = $NgayBinhLuan;
        $c->SoSao = $SoSao;

        $c->save();
    }
    public $timestamps = false;
}