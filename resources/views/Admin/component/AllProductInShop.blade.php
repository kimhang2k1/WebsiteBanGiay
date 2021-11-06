<div class="max-w-full overflow-x-auto w-full ml-1 mt-4" style="height: 30em;">
    <table class="w-full text-sm">
        <tr class="font-bold">
            <td>ID Sản Phẩm</td>
            <td>Hình Ảnh</td>
            <td>Tên Sản Phẩm</td>
            <td>Loại</td>
            <td>Giá Sản Phẩm</td>
            <td>Thương Hiệu</td>
            <td>Trạng Thái</td>
            <td>Tác vụ</td>
        </tr>
        @foreach($product as $p)
        <tr>
            <td>{{ $p->IDSanPham }}</td>
            <td>
                <img class="w-24" src="/img/{{ $p->HinhAnh }}" class="ml-6" style="margin-top:1px;margin-bottom:2px;">
            </td>
            <td>{{ $p->TenSP }}</td>
            <td>{{ $p->TenNhom }}</td>
            <td>{{ $p->GiaSP }}</td>
            <td>{{ $p->TenThuongHieu }}</td>
            <td><span class="rounded-full text-white" style="background-color: lightseagreen;border:0;padding:6px;">Còn
                    Hàng</span></td>
            <td class="text-xl">
                <i class="fas fa-pen-square" style="padding:8px;color:#2e6da4;" onclick="openFormEditProduct()"></i>
                <i class="fas fa-trash-alt" style="color:red;" onclick="deleteProduct1()"></i>
            </td>
        </tr>
        @endforeach
    </table>
</div>