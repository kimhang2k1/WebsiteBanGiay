<div class="w-full flex">
    <div class="w-1/2">
        <p class="font-bold"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;Địa Chỉ Nhận Hàng</p>
    </div>
    <div class="w-1/2 text-sm ">
        <button class="w-40 h-9 border border-gray-300 p-1" onclick="openDeliveryAddress()"><i class="fas fa-plus"></i>
            &nbsp;&nbsp;
            Thêm
            địa chỉ
            mới</button>
        <button class="w-40 h-9 border border-gray-300 p-1">Chỉnh sửa địa chỉ</button>
    </div>
</div>

<div class="w-full mt-4">
    @foreach($address as $dc)
    <div class="flex space-x-4 text-sm leading-8">
        <div>
            @if($dc->IDDiaChi == $addressDefault[0]->IDDiaChi)
            <input type="radio" name="myAddress" value="{{$dc->IDDiaChi}}" checked>
            @else
            <input type="radio" name="myAddress" value="{{$dc->IDDiaChi}}">
            @endif
        </div>
        <div>
            <p>{{ $dc->HoTen }} &nbsp;&nbsp;(+84)&nbsp;{{ $dc->SDT}}&nbsp; -&nbsp; {{ $dc->SoNha}},{{ $dc->TenXa}},
                {{ $dc->TenQuan}},
                {{ $dc->TenThanhPho}}
            </p>
        </div>
    </div>
    @endforeach
</div>
<div class="w-full mt-4 flex space-x-4 text-sm">
    <div>
        <button class="w-32 h-9 border border-13283f bg-13283f text-white" onclick="getAddressDefault()">Hoàn
            Thành</button>
    </div>
    <div>
        <button class="w-32 h-9 border border-gray-300 bg-white text-black">Trở lại</button>
    </div>
</div>