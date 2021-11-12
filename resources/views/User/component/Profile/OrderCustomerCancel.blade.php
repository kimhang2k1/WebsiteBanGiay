<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
?>
@foreach($orderCancel as $o)
<div class="w-full mt-4 mb-4 bg-white shadow  ">
    <div class="flex pb-2 pt-4 font-bold px-4 pt-1">
        <div class="w-1/2 text-sm">
            ID Đơn Hàng :
            {{ $o->IDDonHang}}
        </div>
        <div class="w-1/2 flex justify-end font-normal text-sm space-x-4">
            <div class="border-r border-gray-300 mr-1">
                <span class="text-red-500 pr-1"> Đơn Hàng Đã Được Hủy</span>
                <i class="pr-2 far fa-question-circle"></i>
            </div>
            <div>
                <span class="text-red-500">ĐÃ HỦY</span>
            </div>
        </div>

    </div>
    <?php
    $id = Session::get('user')[0]->IDTaiKhoan;
    $bill =  DB::table('donhang')->JOIN('chitietdonhang', 'donhang.IDDonHang', '=', 'chitietdonhang.IDDonHang')
        ->JOIN('sanpham', 'sanpham.IDSanPham', '=', 'chitietdonhang.IDSanPham')
        ->JOIN('size', 'size.IDSize', '=', 'chitietdonhang.IDSize')->where('IDTaiKhoan', '=', $id)->where('IDTrangThai', '=', 5)
        ->where('donhang.IDDonHang', '=', $o->IDDonHang)->get();
    ?>
    @foreach($bill as $b)
    <div class="w-full flex pl-4 text-sm border-t border-gray-300">
        <div class="mr-4">
            <img class="w-24" src="/img/{{ $b->HinhAnh }}">
        </div>
        <div class="w-96 leading-6 mt-6">
            <div>
                {{ $b->TenSP }}
            </div>
            <div class="text-gray-400 text-sm">
                <span> Size : {{ $b->SoSize }}</span>
            </div>
        </div>
        <div class="w-64 leading-6 mt-6">
            {{number_format($b->GiaSP)}}
        </div>
        <div class="w-40 leading-6 mt-6">
            Qty:{{ $b->SoLuong }}
        </div>
    </div>
    @endforeach
</div>
@endforeach