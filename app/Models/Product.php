<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'sanpham';
    protected $fillable = [
        'IDSanPham',
        'TenSP',
        'GiaSP',
        'HinhAnh',
        'MoTa',
        'IDNhomSP',
        'IDThuongHieu',
        'TrangThai'
    ];
    public static function create(
        $IDSanPham,
        $TenSP,
        $GiaSP,
        $HinhAnh,
        $MoTa,
        $IDNhomSP,
        $IDThuongHieu,
        $TrangThai
    ) {
        $p = new Product();
        $p->IDSanPham = $IDSanPham;
        $p->TenSP = $TenSP;
        $p->GiaSP = $GiaSP;
        $p->HinhAnh = $HinhAnh;
        $p->MoTa = $MoTa;
        $p->IDNhomSP = $IDNhomSP;
        $p->IDThuongHieu = $IDThuongHieu;
        $p->TrangThai = $TrangThai;

        $p->save();
    }
    public $timestamps = false;
}