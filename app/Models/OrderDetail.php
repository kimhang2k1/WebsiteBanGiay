<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'chitietdonhang';
    protected $fillable = [
        'IDDonHang',
        'IDSanPham',
        'IDSize',
        'GiaSP',
        'SoLuong',
        'ThanhTien',
        'Status'

    ];
    public static function create(
        $IDDonHang,
        $IDSanPham,
        $IDSize,
        $GiaSP,
        $SoLuong,
        $ThanhTien,
        $Status




    ) {
        $ctdh = new OrderDetail();
        $ctdh->IDDonHang = $IDDonHang;
        $ctdh->IDSanPham = $IDSanPham;
        $ctdh->IDSize = $IDSize;
        $ctdh->GiaSP = $GiaSP;
        $ctdh->SoLuong = $SoLuong;
        $ctdh->ThanhTien = $ThanhTien;
        $ctdh->Status = $Status;

        $ctdh->save();
    }
    public $timestamps = false;
}