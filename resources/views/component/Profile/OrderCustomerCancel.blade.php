<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
?>

<div class="w-full mt-4 mb-4 bg-white shadow  ">
    <div class="flex pb-2 pt-4 font-bold px-4 pt-1">
        <div class="w-1/2 text-sm">
            ID Đơn Hàng :
            DH10000001
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
    <div class="w-full flex pl-4 text-sm border-t border-gray-300">
        <div class="mr-4">
            <img class="w-24" src="/img/1.jpg">
        </div>
        <div class="w-96 leading-6 mt-6">
            <div>
                Giày Thể Thao Nam Adidas Vl Court 2.0
            </div>
            <div class="text-gray-400 text-sm">
                <span> Size : 38</span>
            </div>
        </div>
        <div class="w-64 leading-6 mt-6">
            {{number_format(1880000)}}
        </div>
        <div class="w-40 leading-6 mt-6">
            Qty:1
        </div>
    </div>
</div>