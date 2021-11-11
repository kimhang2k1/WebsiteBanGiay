<div class="w-full">
    <h2 class="font-bold text-2xl">Chi Tiết Đơn Hàng</h2>
</div>
<div class="mt-4">
    @foreach($inforOrder as $inf)
    <div class="table-customer w-full text-sm ">
        <div class="w-full border border-gray-300 pl-4 leading-10">
            <span class="font-bold text-base my-4">Thông Tin Khách Hàng</span>
            <div class="w-full flex space-x-12 ">
                <div class="mr-1">Thông Tin Người Đặt Hàng</div>
                <div>{{ $inf->HoTen}}</div>
            </div>
            <div class="w-full flex space-x-28">
                <div class="mr-3">Ngày Đặt Hàng</div>
                <div>{{ $inf->NgayDatHang}}</div>
            </div>
            <div class="w-full flex space-x-32">
                <div class="mr-2">Số điện thoại</div>
                <div>0{{ $inf->SDT}}</div>
            </div>
            <div class="w-full flex space-x-40">
                <div class="mr-3">Địa Chỉ</div>
                <div>{{ $inf->SoNha}}, {{ $inf->TenXa}}, {{ $inf->TenQuan}},{{ $inf->TenThanhPho}}</div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="w-full">
        <div class="w-full mt-4  p-4">
            <div class="w-full flex">
                <div class="w-3/5 text-sm">
                    Sản Phẩm
                </div>
                <div class="w-1/5 text-sm text-black text-center">Số Lượng</div>
                <div class="w-1/5 text-sm text-black text-center">Thành Tiền</div>
            </div>
            <div class="w-full">
                @foreach($detailOrder as $d)
                <div class="w-full flex text-sm border-b border-gray-300" style="line-height: 7rem;">
                    <div class="w-3/5 flex space-x-4">
                        <div class="w-1/5">
                            <img class="w-24" src="/img/{{ $d->HinhAnh }}">
                        </div>
                        <div class="w-2/5 truncate  pr-4">{{ $d->TenSP }}
                        </div>
                        <div class="w-2/5 leading-none pt-12 text-gray-500">
                            <p>Size:{{ $d->SoSize }}</p>
                        </div>
                    </div>
                    <div class="w-1/5 text-center">{{ $d->SoLuong }}</div>
                    <div class="w-1/5 text-center">
                        {{ number_format($d->GiaSP * $d->SoLuong)}}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="w-full flex justify-end pr-24">
            <span>Tổng Tiền :<span class="text-red-500"> 1.990.000đ</span></span>
        </div>
    </div>

    <div class="w-full flex justify-end pr-24 my-4 text-sm space-x-4">
        <div class="pt-2 font-bold">
            Trạng Thái Giao Hàng
        </div>
        <div>
            <select class="border border-gray-300 px-4 py-2" id="status">
                @foreach($status as $s)
                @if($s->IDTrangThai == $inforOrder[0]->IDTrangThai )
                <option value="{{$s->IDTrangThai}}" selected>{{$s->Loai}}</option>
                @else
                <option value="{{$s->IDTrangThai}}">{{$s->Loai}}</option>
                @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="w-full flex justify-end pr-24">
        <button class="border border-gray-300 bg-12283e text-white px-4 py-2" type="button"
            onclick="updateOrder('{{$inforOrder[0]->IDDonHang}}')">Xử
            Lý</button>
    </div>
</div>