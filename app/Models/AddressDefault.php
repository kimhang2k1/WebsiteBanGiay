<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressDefault extends Model
{
    use HasFactory;
    protected $table = 'diachimacdinh';
    protected $fillable = [
        'IDDiaChi',
        'IDTaiKhoan',
        'TrangThai',

    ];
    public static function create(
        $IDDiaChi,
        $IDTaiKhoan,
        $TrangThai,



    ) {
        $default = new AddressDefault();
        $default->IDDiaChi = $IDDiaChi;
        $default->IDTaiKhoan = $IDTaiKhoan;
        $default->TrangThai = $TrangThai;

        $default->save();
    }
    public $timestamps = false;
}