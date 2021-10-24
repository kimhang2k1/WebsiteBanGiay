@if (count($productbyID)>0)
@foreach($productbyID as $sp)
<div class="item_product w-120 text-center">
    <div class="w-full ">
        <a href="{{url('product/product_detail/'.$sp->IDSanPham.'&&'.$sp->IDThuongHieu)}}"><img
                src="/img/{{ $sp->HinhAnh}}"
                class="w-60 m-auto transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110"></a>
    </div>
    <div class="w-60 truncate mx-4 my-2">
        <a href="{{url('product/product_detail/'.$sp->IDSanPham.'&&'.$sp->IDThuongHieu)}}">
            <span>{{ $sp->TenSP}}</span></a>
    </div>
    <div class="w-72">
        <span class="text-red-500 font-bold">{{ number_format($sp->GiaSP * 0.9)}}</span>
        <strike class="text-gray-600">{{number_format( $sp->GiaSP)}}</strike>
    </div>
    <div class="btn_add_cart w-full my-4 invisible">
        <p class="w-48 leading-8 border-2 border-red-500 text-white bg-red-500 ml-12">
            <a href="{{url('product/product_detail/'.$sp->IDSanPham.'&&'.$sp->IDThuongHieu)}}">Xem Chi Tiết</a>
        </p>
    </div>
</div>
@endforeach
@endif