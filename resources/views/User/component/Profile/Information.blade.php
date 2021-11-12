<div class="w-full flex px-8 mt-4 m-auto leading-10">
    <div class="w-full">
        <div class="text-sm text-gray-600 leading-10">
            Họ Tên
        </div>
        <div class="text-sm ">
            <span>{{ $profile[0]->Ten}}</span>
        </div>
    </div>
    <div class="w-full">
        <div class="text-sm flex text-gray-600 leading-8  space-x-4">
            <div>Email</div>
            <div>
                <u class="text-blue-500">Thay Đổi</u>
            </div>
        </div>
        <div class="text-sm leading-10">
            {{ $profile[0]->Email}}
        </div>
    </div>
    <div class="w-full">
        <div class="text-sm text-gray-600 leading-8 flex space-x-4">
            <div>SDT</div>
            <div>
                <u class="text-blue-500 ">Thay Đổi</u>
            </div>
        </div>
        <div class="text-sm leading-10">
            0{{ $profile[0]->SoDienThoai}}
        </div>
    </div>
</div>
<div class="w-full ml-8 mt-16">
    <div class="w-full">
        <button class="border border-gray-300 bg-13283f text-white w-60 h-12 text-sm  mb-4" type="button"
            onclick="openEditInformation()">SỬA
            THÔNG TIN</button>
    </div>
    <div class="w-full">
        <button class="border border-gray-300 bg-13283f text-white text-sm w-60 h-12" type="button"
            onclick="openChangePassword()">ĐỔI
            MẬT KHẨU</button>
    </div>
</div>