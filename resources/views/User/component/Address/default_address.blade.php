<div class="w-full">
    <p class="font-bold"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;Địa Chỉ Nhận Hàng</p>
</div>
<div class="w-full flex">
    <div class="w-4/5">
        @foreach($addressDefault as $dc)
        <p>{{ $dc->HoTen }} &nbsp;&nbsp;(+84)&nbsp;{{ $dc->SDT}}&nbsp; -&nbsp; {{ $dc->SoNha}},{{ $dc->TenXa}},
            {{ $dc->TenQuan}},
            {{ $dc->TenThanhPho}}
        </p>
        @endforeach
    </div>
    <div class="w-1/5">
        <p class="cursor-pointer" onclick="openDivAddress()">THAY ĐỔI</p>
    </div>
</div>