<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

?>
@foreach ($billCustomer as $bill)
<div class="w-full border border-gray-300">
    <div class="w-full">
        <div class="w-full mt-4 mb-4 bg-white shadow  ">
            <div class="flex pb-2 pt-4 font-bold px-4 pt-1">
                <div class="w-1/2 text-sm">
                    ID Đơn Hàng :
                    {{ $bill->IDDonHang}}
                </div>
                <div class="w-1/2 flex justify-end font-normal text-sm space-x-4">
                    @switch($bill->IDTrangThai)
                    @case(1)
                    <div class="border-r border-gray-300 mr-1">
                        <span class="text-red-500"> Đang Chờ Xác Nhận</span>
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
                        <span class="text-green-500 pr-2"><i class="pr-2 fas fa-truck-moving"></i>Đang Giao
                            Hàng</span>
                        <i class="pr-2 far fa-question-circle"></i>
                    </div>
                    <div>
                        <span class="text-red-500">ĐANG GIAO</span>
                    </div>
                    @break
                    @case(4)
                    <div class="border-r border-gray-300 mr-1">
                        <span class="text-green-500 pr-2"><i class="pr-2 fas fa-truck-moving"></i>Giao Hàng Thành
                            Công</span>
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
                ->JOIN('size', 'size.IDSize', '=', 'chitietdonhang.IDSize')->where('IDTaiKhoan', '=', $id)->where('donhang.IDDonHang', '=', $bill->IDDonHang)->get();
            ?>
            @foreach($bill as $b)
            <div class="w-full flex pl-4 text-sm border-t border-gray-300">
                <div class="mr-4">
                    <img class="w-24" src="/img/{{ $b->HinhAnh}}">
                </div>
                <div class="w-96 leading-6 mt-6">
                    <div>
                        {{ $b->TenSP}}
                    </div>
                    <div class="text-gray-400 text-sm">
                        <span> Size :{{ $b->SoSize}}</span>
                    </div>
                </div>
                <div class="w-64 leading-6 mt-6">
                    {{number_format( $b->GiaSP)}}
                </div>
                <div class="w-40 leading-6 mt-6">
                    Qty:{{ $b->SoLuong}}
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>
@endforeach
<div class="w-full flex bg-gray-100 space-x-4">
    <div class="w-1/2 leading-8 bg-white space-x-4 px-4 py-4">
        <div class="w-full font-bold text-base">
            Thông Tin Khách Hàng
        </div>
        <div class="w-full text-sm leading-8 mt-4">
            <div>Nguyễn Thị Thiên Kim</div>
            <div>Tỉnh Hà Giang, Huyện Đồng Văn ,Xã Lũng Cú</div>
            <div>0857355330</div>
        </div>

    </div>
    <div class="w-1/2 leading-8 bg-white py-4 px-4 text-sm">
        <div class="w-full">
            <div class="w-full">
                <span class="font-bold text-base">Tổng Cộng</span>
            </div>
            <div class="w-full flex space-x-60 mb-4">
                <div class="mr-2">
                    Tổng Tiền(<span class="px-1">1</span>sản phẩm)
                </div>
                <div>
                    1.880.000đ
                </div>
            </div>
            <div class="w-full flex space-x-72 mb-4 border-b border-gray-300">
                <div class="mr-2">
                    Phí Vận Chuyển
                </div>
                <div>
                    25.000đ
                </div>
            </div>
            <div class="w-full flex space-x-80 text-sm mb-4">
                <div class="mr-2">
                    Tổng Cộng
                </div>
                <div class="text-base">
                    1.880.000
                </div>
            </div>
            <div class="w-full flex space-x-4 my-4 justify-end pr-8 ">
                <button class="bg-12283e text-white px-4 py-1" type="button">Hủy Đơn
                    Hàng</button>
            </div>
        </div>
    </div>
</div>