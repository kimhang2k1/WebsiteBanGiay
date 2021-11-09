<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;
    protected $table = 'nhomsanpham';
    protected $fillable = [
        'IDNhomSP',
        'TenNhom',
    ];
    public static function create(
        $IDNhomSP,
        $TenNhom,
    ) {
        $c = new CategoryProduct();
        $c->IDNhomSP = $IDNhomSP;
        $c->TenNhom = $TenNhom;
        $c->save();
    }
    public $timestamps = false;
}