<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'diachikhachhang';
    protected $fillable = [
        'HoTen',
        'SDT',
        'IDXa',
        'IDQuan',
        'IDThanhPho',
        'SoNha',
        'IDTaiKhoan'
    ];
    public static function create(
        $HoTen,
        $SDT,
        $IDXa,
        $IDQuan,
        $IDThanhPho,
        $SoNha,
        $IDTaiKhoan,


    ) {
        $address = new Address();
        $address->HoTen = $HoTen;
        $address->SDT = $SDT;
        $address->IDXa = $IDXa;
        $address->IDQuan = $IDQuan;
        $address->IDThanhPho = $IDThanhPho;
        $address->SoNha = $SoNha;
        $address->IDTaiKhoan = $IDTaiKhoan;
        $address->save();
    }
    public $timestamps = false;
}