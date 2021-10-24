<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
?>
<div class="box-cart w-120 border h-screen border-gray-300 p-4 absolute bg-white text-black hidden "
    style="top: 0;right: 0;">
    <div class="w-full py-4 px-4 flex">
        <div class="w-1/2">
            <h2 class="font-bold text-2xl">Giỏ Hàng</h2>
        </div>
        <div class="w-1/2 flex justify-end text-2xl cursor-pointer" onclick="closeToCart()">
            <i class="far fa-times-circle"></i>
        </div>
    </div>
    <hr>
    @if(session()->has('user'))
    <?php
    $id = Session::get('user')[0]->IDTaiKhoan;
    $cart = DB::table('giohang')->JOIN('sanpham', 'sanpham.IDSanPham', '=', 'giohang.IDSanPham')->JOIN('size', 'size.IDSize', '=', 'giohang.IDSize')->where('IDTaiKhoan', '=', $id)->get();



    ?>
    @if(count($cart) > 0)
    <div class="parent-cart w-full mt-4 overflow-y-scroll h-96">
        @foreach($cart as $c)
        <div class="w-full flex text-sm border border-gray-300 p-4 space-x-4 my-4">
            <div>
                <img class="w-24" src="/img/{{ $c->HinhAnh }}">
            </div>
            <div>
                <div class="w-full">
                    <p>{{ $c->TenSP}}</p>
                </div>
                <div class="w-full text-gray-400">
                    Size: <span>{{ $c->SoSize }}</span>
                </div>
                <div class="w-full">
                    <p class="text-red-600 font-bold">{{ number_format($c->GiaSP) }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="w-full flex  justify-center items-center mt-4  h-96">
        <p class="text-xl text-center  ">Chưa có sản phẩm nào</p>
    </div>
    @endif
    @else
    <div class="w-full flex  justify-center items-center mt-4  h-96">
        <p class="text-xl text-center  ">Chưa có sản phẩm nào</p>
    </div>
    @endif
    <hr>

    <div class="w-full flex mt-4">
        @if(session()->has('user'))
        <?php
        $id = Session::get('user')[0]->IDTaiKhoan;
        $checkCart = DB::table('giohang')->where('IDTaiKhoan', '=', $id)->get();



        ?>
        @if(count($checkCart) > 0)
        <div class="w-1/2">
            <a href="{{ url('cart')}}"><button class="w-48 h-12 border-2 border-13283f text-13283f font-bold">Xem Giỏ
                    Hàng</button></a>
        </div>
        @else
        <div class="w-1/2">
            <button class="w-48 h-12 border-2 border-13283f text-13283f font-bold cursor-not-allowed" disabled>Xem Giỏ
                Hàng</button>
        </div>
        @endif
        @else
        <div class="w-1/2">
            <button class="w-48 h-12 border-2 border-13283f text-13283f font-bold cursor-not-allowed" disabled>Xem Giỏ
                Hàng</button>
        </div>
        @endif
        <div class="w-1/2">
            <a href="{{ url('payment') }}"><button
                    class="w-48 h-12 border-2 border-13283f bg-13283f text-white font-bold ">Thanh
                    Toán</button></a>
        </div>
    </div>
</div>