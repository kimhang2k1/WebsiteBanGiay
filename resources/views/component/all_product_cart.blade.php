<div class="w-full mt-16">
    <table class="w-full border-b border-gray-300">
        <tr class="font-bold border-b border-gray-300 text-sm h-12 text-center">
            <td class="w-40">Hình Ảnh</td>
            <td class="w-96 text-justify">Sản Phẩm</td>
            <td class="w-40">Giá</td>
            <td class="w-40">Số Lượng</td>
            <td class="w-40">Thành Tiền</td>
        </tr>
        @foreach($shoppingCart as $c)
        <tr class="text-center h-40 text-base" id="{{$c->STT}}cart">
            <td class="w-40"><img src="./img/{{ $c->HinhAnh }}" class="w-24 m-auto"></td>
            <td class="text-justify">
                <p>{{ $c->TenSP }}</p>
                <p class="text-sm text-gray-400">Kích Thước : {{ $c->SoSize }}</p>
            </td>
            <td>
                <p id="{{$c->STT}}money">{{ number_format($c->GiaSP)  }}</p>
            </td>
            <td>
                <ul class="flex ml-8">
                    <li><button class="border border-gray-300 w-8 leading-8"
                            onclick="increaseNumber('{{ $c->STT }}')">+</button></li>
                    <li><input type="text" name="" id="{{ $c->STT }}number" value="{{ $c->SoLuong}}"
                            class="border border-gray-300 w-12 text-center leading-8"></li>
                    <li><button class="border border-gray-300 w-8 leading-8"
                            onclick="decreaseNumber('{{ $c->STT}}')">-</button></li>
                </ul>
            </td>
            <td>
                <p id="{{$c->STT}}total-money">{{ number_format($c->GiaSP * $c->SoLuong) }}</p>
            </td>
            <td>
                <p onclick="deleteCart('{{ $c->STT }}')">Xóa</p>
            </td>
        </tr>
        @endforeach
    </table>
</div>
<div class="w-full mt-8 flex">
    <div class="w-1/2">
        <div class="w-full">
            <p class="text-sm text-gray-600">Thêm ghi chú cho đơn hàng của bạn</p>
        </div>
        <div class="w-full mt-4">
            <textarea class="w-96 border border-gray-300"></textarea>
        </div>
    </div>
    <?php $sum = 0;
    foreach ($shoppingCart as $key => $value) {
        $thanhTien = $shoppingCart[$key]->GiaSP * $shoppingCart[$key]->SoLuong;
        $sum += $thanhTien;
    }

    ?>
    <div class="w-1/2 text-right pr-8">
        <div class="w-full">
            <p>TỔNG TIỀN :
                <span class="font-bold text-red-600" style="font-size:20px;"
                    id="all-money">{{ number_format($sum) }}</span>
            </p>
        </div>
        <div class="w-full mt-3">
            <p class="text-gray-400 text-sm text-gray-600">Thuế và vận chuyển được tính khi thanh toán.</p>
        </div>
        <div class="w-full mt-4">
            <a href="{{ url('payment') }}"> <button
                    class="w-60 h-12 border border-gray-300 bg-gray-800 text-white text-sm">THANH
                    TOÁN</button></a>
        </div>
    </div>
</div>