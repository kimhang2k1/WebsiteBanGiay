<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
?>
@foreach($orderCustomer as $o )
<div class="w-full mt-4 mb-4 bg-white shadow  ">
    <div class="flex pb-2 pt-4 font-bold px-4 pt-1">
        <div class="w-1/2 text-sm">
            ID Đơn Hàng :
            {{ $o->IDDonHang}}
        </div>
        <div class="w-1/2 flex justify-end font-normal text-sm space-x-4">
            @switch($o->IDTrangThai)
            @case(1)
            <div class="border-r border-gray-300 mr-1">
                <span class="text-red-500 pr-2"> Đang Chờ Xác Nhận</span>
                <i class="pr-2 far fa-question-circle"></i>
            </div>
            <div>
                <span class="text-red-500">ĐANG DUYỆT</span>
            </div>
            @break
            @case(2)
            <div class="border-r border-gray-300 mr-1">
                <span class="text-green-500"><i class="pr-2 fas fa-box-open"></i> Đang Chờ Lấy Hàng</span>
                <i class="pr-2 far fa-question-circle"></i>
            </div>
            <div>
                <span class="text-red-500">ĐANG CHỜ</span>
            </div>

            @break
            @case(3)
            <div class="border-r border-gray-300 mr-1">
                <span class="text-green-500 pr-2"><i class="pr-2 fas fa-truck-moving"></i>Đang Giao Hàng</span>
                <i class="pr-2 far fa-question-circle"></i>
            </div>
            <div>
                <span class="text-red-500">ĐANG GIAO</span>
            </div>
            @break
            @case(4)
            <div class="border-r border-gray-300 mr-1">
                <span class="text-green-500 pr-2"><i class="pr-2 fas fa-truck-moving"></i>Giao Hàng Thành Công</span>
                <i class="pr-2 far fa-question-circle"></i>
            </div>
            <div>
                <span class="text-red-500">ĐÃ GIAO</span>
            </div>
            @break
            @endswitch
        </div>

    </div>
    <?php

    $id = Session::get('user')[0]->IDTaiKhoan;
    $bill =  DB::table('donhang')->JOIN('chitietdonhang', 'donhang.IDDonHang', '=', 'chitietdonhang.IDDonHang')
        ->JOIN('sanpham', 'sanpham.IDSanPham', '=', 'chitietdonhang.IDSanPham')
        ->JOIN('size', 'size.IDSize', '=', 'chitietdonhang.IDSize')->where('IDTaiKhoan', '=', $id)->whereRaw("donhang.IDDonHang = '" . $o->IDDonHang . "' and not donhang.IDTrangThai = 5")->get();
    ?>
    @foreach($bill as $b)
    <div class="w-full flex pl-4 text-sm border-t border-gray-300" onclick="getDetailOrder('{{$b->IDDonHang}}')">
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