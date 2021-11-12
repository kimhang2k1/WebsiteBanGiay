<div class="max-w-full overflow-x-auto w-full ml-1 mt-4">
    <table class="w-full text-sm">
        <tr class="font-bold">
            <td>ID Khách Hàng</td>
            <td>Tên Khách Hàng</td>
            <td>Địa Chỉ</td>
            <td>SĐT</td>
        </tr>
        @foreach($customer as $kh)
        <tr>
            <td>{{ $kh->IDTaiKhoan }}</td>
            <td>{{ $kh->HoTen }}</td>
            <td class="px-40 text-left">{{ $kh->SoNha }},{{ $kh->TenXa }},{{ $kh->TenQuan }},{{ $kh->TenThanhPho}}</td>
            <td>0{{ $kh->SDT }}</td>
        </tr>
        @endforeach
    </table>
</div>