<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
?>
<div class="w-full bg-12283e relative">
    <div class="w-4/5 m-auto">
        <div class="w-full flex text-white text-sm pt-4">
            <div class="w-1/2 flex space-x-4">
                <img src="//cdn.shopify.com/s/files/1/0456/5070/6581/t/17/assets/vi.png?v=11551875860095538003"
                    style="margin-top:-3px;">
                <p class="text-white">Tiếng Việt</p>
            </div>
            <div class="w-1/2">
                <ul class="account flex float-right space-x-8">
                    @if(session()->has('user'))
                    <li>
                        <a href="#"><i class="pr-2 fas fa-user-circle"></i>{{ Session::get('user')[0]->Email }}</a>
                        <div
                            class="account-1  absolute border border-gray-300 bg-white text-black p-4 w-40 leading-8 hidden">
                            <p class="hover:text-red-600"><a href="dangxuat">Đăng Xuất</a></p>
                        </div>
                    </li>
                    @else
                    <li>
                        Tài Khoản
                        <div
                            class="account-1  absolute border border-gray-300 bg-white text-black p-4 w-40 leading-8 hidden">
                            <p class="hover:text-red-600"><a href="{{ url('login') }}">Đăng Nhập</a></p>
                            <p class="hover:text-red-600"><a href="{{ url('register') }}">Đăng Ký</a></p>
                        </div>

                    </li>
                    @endif
                    <li>Hệ thống cửa hàng &nbsp;&nbsp;<i class="fas fa-map-marker-alt"></i></li>
                </ul>
            </div>
        </div>
        <div class="w-full flex text-white my-4 text-sm">
            <div class="w-2/5">
                <img src="/img/logo-mona.png" class="w-40">
            </div>
            <div class="w-3/5 flex space-x-4" style="line-height: 4rem;">
                <form action="/search" method="GET" id="some_form">
                    <div>
                        <input type="text" name="search" id="mysearch" placeholder="Tìm kiếm" class="text-black caret-blue-500 focus:border-blue-500 
                    border border-gray-300 w-96 pl-4" style="height: 40px;" oninput="getProduct()">
                        <button class="border border-green-600 bg-green-600 text-white w-24 h-12 leading-8"
                            type="submit" style="margin-left:-4px;height: 40px;">Tìm Kiếm</button>
                        <div class="border border-gray-300 bg-white absolute hidden"
                            style="width:30rem;top:6.5rem;z-index:1000;" id="display-product">
                            <div>

                            </div>
                        </div>
                    </div>
                </form>

                @if (session()->has('user'))
                <?php



                $id = Session::get('user')[0]->IDTaiKhoan;
                $cart = DB::table('giohang')->where('IDTaiKhoan', '=', $id)->get();
                ?>
                <div class="cart border border-gray-300  bg-white text-black px-4 pt-3 mt-3 leading-4 cursor-pointer "
                    style="height: 40px;" onclick="openToCart()">
                    <p><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp; Giỏ Hàng(<span
                            id="number-cart">{{ count($cart)}}</span>)</p>

                </div>
                @else
                <div class="cart border border-gray-300  bg-white text-black px-4 pt-3 mt-3 leading-4 cursor-pointer "
                    style="height: 40px;" onclick="openToCart()">
                    <p><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp; Giỏ Hàng(<span id="number-cart">0</span>)</p>

                </div>
                @endif

            </div>
        </div>
        <div class="w-full h-12 text-white">
            <div class="menu w-full m-auto leading-12">
                <ul class="product flex space-x-16 font-bold text-14 cursor-pointer justify-center relative">
                    <li><a href="{{ url('home')}}">TRANG CHỦ</a></li>
                    <li><a href="#">GIỚI THIỆU</a></li>
                    <li><a href="{{ url('product/NSP00001') }}">GiÀY NỮ</a></li>
                    <li><a href="{{ url('product/NSP00002') }}">GIÀY NAM</a></li>
                    <li><a href="{{ url('product/NSP00003') }}">PHỤ KIỆN KHÁC</a></li>
                    <li><a href="#">LIÊN HỆ</a></li>

                </ul>
            </div>
        </div>
    </div>
</div>