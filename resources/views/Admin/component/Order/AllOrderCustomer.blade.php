<div class="max-w-full overflow-x-auto w-full ml-1 mt-4">
    <table class="w-full text-sm">
        <tr class="font-bold">
            <td>ID Đơn Hàng</td>
            <td>Tên Khách Hàng</td>
            <td>SĐT</td>
            <td>Địa Chỉ Giao Hàng</td>
            <td>Ngày Đặt Hàng</td>
            <td>Trạng Thái</td>
        </tr>
        @foreach($order as $o)
        <tr>
            <td>{{ $o->IDDonHang }}</td>
            <td>{{ $o->HoTen }}</td>
            <td>0{{ $o->SDT}}</td>
            <td>{{ $o->SoNha}}, {{ $o->TenXa}}, {{ $o->TenQuan}},{{ $o->TenThanhPho}}</td>
            <td>{{ $o->NgayDatHang}}</td>
            <td>
                @switch($o->IDTrangThai)
                @case(1)
                <div class="text-white bg-red-500 border border-red-500 px-4 my-4 rounded-full">{{ $o->Loai}}</div>
                @break
                @case(2)
                <div class="text-white bg-blue-500 border border-green-500 px-4 my-4  rounded-full">{{ $o->Loai}}</div>
                @break
                @case(3)
                <div class="text-white bg-green-500 border border-green-500 px-4 my-4  rounded-full">{{ $o->Loai}}</div>
                @break
                @case(4)
                <div class="text-white bg-green-500 border border-green-500 px-4 my-4 rounded-full">{{ $o->Loai}}</div>
                @break
                @endswitch
            </td>
            <td><u class="text-blue-500" onclick="openDetailOrder('{{ $o->IDDonHang }}')">Chi Tiết</u></td>
        </tr>
        @endforeach
    </table>
</div>