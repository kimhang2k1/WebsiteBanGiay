@if (empty($product))
<div class="w-full flex mt-4">
    Không có sản phẩm nào
</div>
@else
@foreach($product as $p)
<a href="{{ url('product/product_detail/'.$p->IDSanPham.'&&'.$p->IDThuongHieu) }}">
    <div class="w-full flex mt-4">
        <div>
            <img class="w-24" src="/img/{{ $p->HinhAnh }}">
        </div>
        <div class="text-black leading-6">
            <div class="w-full">
                <span class="text-black font-bold">
                    {{ $p->TenSP }}</span>
            </div>
            <div class="w-full text-gray-400">
                {{ $p->TenThuongHieu }}
            </div>
            <div class="w-full">
                <span class="text-red-600">{{ number_format( $p->GiaSP * 0.9) }}₫</span>
                <strike class="text-gray-500">{{ number_format($p->GiaSP) }}₫ </strike>
            </div>
        </div>
    </div>
</a>

@endforeach
@endif