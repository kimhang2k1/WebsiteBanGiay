<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;
    protected $table = 'donhang';
    protected $fillable = [
        'IDDonHang',
        'IDTaiKhoan',
        'NgayDatHang',
        'NgayGiaoHang',
        'IDDiaChi',
        'IDTrangThai'

    ];
    public static function create(
        $IDDonHang,
        $IDTaiKhoan,
        $NgayDatHang,
        $NgayGiaoHang,
        $IDDiaChi,
        $IDTrangThai,




    ) {
        $dh = new DonHang();
        $dh->IDDonHang = $IDDonHang;
        $dh->IDTaiKhoan = $IDTaiKhoan;
        $dh->NgayDatHang = $NgayDatHang;
        $dh->NgayGiaoHang = $NgayGiaoHang;
        $dh->IDDiaChi = $IDDiaChi;
        $dh->IDTrangThai = $IDTrangThai;

        $dh->save();
    }
    public $timestamps = false;
}