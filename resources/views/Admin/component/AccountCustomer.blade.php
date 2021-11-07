<div class="max-w-full overflow-x-auto w-full ml-1 mt-4">
    <table class="w-full text-sm">
        <tr class="font-bold">
            <td>ID Tài Khoản</td>
            <td>Tên</td>
            <td>SDT</td>
            <td>Email</td>
            <td>Mật Khẩu</td>
        </tr>
        @foreach($account as $ac)
        <tr>
            <td>{{ $ac->IDTaiKhoan}}</td>
            <td>{{ $ac->Ten}}</td>
            <td>0{{ $ac->SoDienThoai}}</td>
            <td class="px-20">{{ $ac->Email}}</td>
            <td class="px-20">{{ $ac->MatKhau}}</td>
        </tr>
        @endforeach
    </table>
</div>