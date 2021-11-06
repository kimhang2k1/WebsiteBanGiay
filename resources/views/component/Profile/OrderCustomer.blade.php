<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
?>
@foreach($order as $o )
<div class="w-full mt-4 mb-4 bg-white shadow  ">
    <div class="flex pb-2 pt-4 font-bold px-4 pt-1">
        <div class="w-1/2 text-sm">
            <i class="text-gray-500 mt-1 mr-1 fas fa-store"></i> monashop
        </div>
        <div class="w-1/2 flex justify-end font-normal text-sm">
            ID Đơn Hàng :
            {{ $o->IDDonHang}}
        </div>
    </div>
    <?php

    $id = Session::get('user')[0]->IDTaiKhoan;
    $bill =  DB::table('donhang')->JOIN('chitietdonhang', 'donhang.IDDonHang', '=', 'chitietdonhang.IDDonHang')
        ->JOIN('sanpham', 'sanpham.IDSanPham', '=', 'chitietdonhang.IDSanPham')
        ->JOIN('size', 'size.IDSize', '=', 'chitietdonhang.IDSize')->where('IDTaiKhoan', '=', $id)->where('donhang.IDDonHang', '=', $o->IDDonHang)->get();
    ?>
    @foreach($bill as $b)
    <div class="w-full flex pl-4 text-sm border-t border-gray-300">
        <div class="mr-4">
            <img class="w-24" src="/img/{{ $b->HinhAnh}}">
        </div>
        <div class="w-96 leading-6 mt-6">
            <div>
                {{$b->TenSP}}
            </div>
            <div class="text-gray-400 text-sm">
                <span> Size : {{$b->SoSize}}</span>
            </div>
        </div>
        <div class="w-64 leading-6 mt-6">
            {{number_format($b->GiaSP)}}
        </div>
        <div class="w-40 leading-6 mt-6">
            Qty:{{$b->SoLuong}}
        </div>
    </div>
    @endforeach
</div>
@endforeach