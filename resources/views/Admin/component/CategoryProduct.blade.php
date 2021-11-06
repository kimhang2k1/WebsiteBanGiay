<table class="m-4 text-sm">
    <tr class="font-bold">
        <td>Mã Nhóm Sản Phẩm</td>
        <td>Tên Nhóm</td>
    </tr>
    @foreach($category as $c)
    <tr>
        <td>{{ $c->IDNhomSP }}</td>
        <td>{{ $c->TenNhom}}</td>
    </tr>
    @endforeach
</table>