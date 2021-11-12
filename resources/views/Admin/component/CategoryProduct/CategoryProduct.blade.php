<table class="m-4 text-sm">
    <tr class="font-bold">
        <td>Mã Nhóm Sản Phẩm</td>
        <td>Tên Nhóm</td>
        <td>Tác vụ</td>
    </tr>
    @foreach($category as $c)
    <tr id="{{$c->IDNhomSP}}category">
        <td>{{ $c->IDNhomSP }}</td>
        <td>{{ $c->TenNhom}}</td>
        <td class="text-xl">
            <i class="fas fa-pen-square" style="padding:8px;color:#2e6da4;"
                onclick="openFormEditCategory('{{ $c->IDNhomSP}}')"></i>
            <i class="fas fa-trash-alt" style="color:red;" onclick="deleteCategoryProduct('{{$c->IDNhomSP }}')"></i>
        </td>
    </tr>
    @endforeach
</table>