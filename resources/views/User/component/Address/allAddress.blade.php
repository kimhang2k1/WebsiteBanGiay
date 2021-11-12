<table class="w-full border-b border-gray-300">
    <tr class="font-bold border-b border-gray-300 text-sm h-12 text-center">
        <td class="w-40">Tên</td>
        <td class="w-48 text-center">Địa chỉ</td>
        <td class="w-64">Mã Vùng</td>
        <td class="w-40">Số điện thoại</td>
    </tr>
    @foreach($addressDefault as $address)
    <tr class="text-center h-24 text-sm border-b border-gray-300" id="{{ $address->IDDiaChi}}Address">
        <td class="w-40">{{ $address->HoTen}}</td>
        <td class="text-center">
            {{ $address->SoNha}}
        </td>
        <td>
            {{ $address->TenThanhPho}}, {{ $address->TenQuan}} ,{{ $address->TenXa}}
        </td>
        <td>
            0{{ $address->SDT}}
        </td>
        <td>
            <span class="text-white bg-green-600 px-4 py-1 rounded-full"> {{$address->TrangThai}}</span>
        </td>
        <td>
            <span class="text-blue-500 mr-4" onclick="openModalEditAddress('{{ $address->IDDiaChi}}')">Chỉnh Sửa</span>
            <span class="text-red-500" onclick="deleteAddress('{{$address->IDDiaChi}}')"><i
                    class="fas fa-trash-alt"></i></span>
        </td>
    </tr>
    @endforeach
    @foreach($addressOfCustomer as $dc)
    <tr class="text-center h-24 text-sm border-b border-gray-300" id="{{ $dc->IDDiaChi}}Address">
        <td class="w-40">{{ $dc->HoTen}}</td>
        <td class="text-center">
            {{ $dc->SoNha}}
        </td>
        <td>
            {{ $dc->TenThanhPho}}, {{ $dc->TenQuan}} ,{{ $dc->TenXa}}
        </td>
        <td>
            0{{ $dc->SDT}}
        </td>
        <td>

        </td>
        <td>
            <span class="text-blue-500 mr-4" onclick="openModalEditAddress('{{ $dc->IDDiaChi}}')">Chỉnh Sửa</span>
            <span class="text-red-500" onclick="deleteAddress('{{$dc->IDDiaChi}}')"><i
                    class="fas fa-trash-alt"></i></span>
        </td>
    </tr>
    @endforeach

</table>