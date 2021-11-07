<div class="max-w-full overflow-x-auto w-full ml-1 mt-4">
    <table class="w-full text-sm">
        <tr class="font-bold">
            <td>ID Đơn Hàng</td>
            <td>Tên Khách Hàng</td>
            <td>SĐT</td>
            <td>Địa Chỉ Giao Hàng</td>
            <td>Tên Sản Phẩm</td>
            <td>Size</td>
            <td>Số Lượng</td>
            <td>Ngày Đặt Hàng</td>
            <td>Trạng Thái</td>
        </tr>
        @foreach($order as $o)
        <tr>
            <td>{{ $o->IDDonHang }}</td>
            <td>{{ $o->HoTen }}</td>
            <td>0{{ $o->SDT}}</td>
            <td>{{ $o->SoNha}}, {{ $o->TenXa}}, {{ $o->TenQuan}},{{ $o->TenThanhPho}}</td>
            <td>{{ $o->TenSP}}</td>
            <td>{{ $o->SoSize}}</td>
            <td>{{ $o->SoLuong}}</td>
            <td>{{ $o->NgayDatHang}}</td>
            <td>
                <span class="rounded-full text-white" style="background-color:lightseagreen;border:0;padding:6px;">Chưa
                    Giao Hàng</span>
                <!-- <span class="rounded-full text-white"
                    style="background-color:lightcoral;border:0;padding:6px;"></span> -->
            </td>
        </tr>
        @endforeach
    </table>
</div>