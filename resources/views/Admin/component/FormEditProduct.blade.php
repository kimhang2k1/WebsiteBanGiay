<div class="title w-full font-serif p-4 text-black">
    <h2 class="text-2xl font-bold">Chỉnh Sửa Sản Phẩm</h2>
</div>
<form action="" method="POST" enctype="multipart/form-data" id="myForm">
    {{ csrf_field() }}
    @foreach($informationProduct as $infor)
    <div class="container w-full mt-4 font-timenewroman pl-4 mt-6 pb-12">
        <div class="flex mb-4 space-x-16">
            <div>
                <span class="font-bold" style="color:#2e6da4;"> Danh Mục </span>
            </div>
            <div>
                <select class="w-40 h-10 rounded-md px-4  border border-gray-300" name="groupProduct">
                    @foreach($category as $nsp)
                    @if($nsp->IDNhomSP == $infor->IDNhomSP)
                    <option value="{{ $nsp->IDNhomSP }}" selected>{{ $nsp->TenNhom }}</option>
                    @else
                    <option value="{{ $nsp->IDNhomSP }}">{{ $nsp->TenNhom }}</option>
                    @endif
                    @endforeach
                </select>
            </div>

        </div>
        <div class="flex space-x-5 mb-4">
            <div>
                <span class="font-bold" style="color:#2e6da4;">Sản Phẩm</span>
            </div>
            <div>
                <input class="border border-gray-300 w-40 leading-10 rounded-md pl-4 ml-11" type="text" name="IDSP"
                    value="{{ $infor->IDSanPham  }}" disabled>
                <input class="border border-gray-300 rounded-md leading-10 pl-4 ml-4" style="width: 35rem;" type="text"
                    id="nameProduct" placeholder="Nhập tên sản phẩm" value="{{ $infor->TenSP }}">
            </div>
        </div>
        <div class="flex space-x-4 mb-4">
            <div>
                <span class="font-bold" style="color:#2e6da4;">Thương Hiệu </span>
            </div>
            <div>
                <select class="border border-gray-300 w-40 h-10 rounded-md px-4 ml-6" name="thuongHieu">
                    <option value="">{{ $infor->TenNhom}}</option>
                    @foreach($brand as $t)
                    @if($t->IDThuongHieu == $infor->IDThuongHieu)
                    <option value="{{ $t->IDThuongHieu }}" selected>{{ $t->TenThuongHieu }}</option>
                    @else
                    <option value="{{ $t->IDThuongHieu }}">{{ $t->TenThuongHieu }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="flex space-x-8 mb-4">
            <div>
                <span class="font-bold" style="color:#2e6da4;">Giá Sản Phẩm </span>
            </div>
            <div>
                <input class=" money border border-gray-300 rounded-md leading-10 pl-4" style="width: 35rem;"
                    type="text" id="price" placeholder="Nhập giá sản phẩm" value="{{ $infor->GiaSP}}">
            </div>
        </div>
        <!-- <div class="flex space-x-4 mb-4">
                                <div>
                                    <span class="font-bold" style="color:#2e6da4;">Số Lượng </span>
                                </div>
                                <div>
                                    <input class=" money border border-gray-300 rounded-md leading-10 pl-4 ml-12"
                                        style="width: 35rem;" type="number" name="amount">
                                </div>

                            </div> -->
        <div class="flex space-x-24 mb-4">
            <div>
                <span class="font-bold" style="color:#2e6da4;"> Mô tả </span>
            </div>
            <div>
                <textarea class="w-60  h-20 rounded-md" style="margin-left:4.5rem;"
                    name="ckeditor2"><?= $infor->MoTa ?></textarea>
                <script>
                CKEDITOR.replace('ckeditor2');
                </script>
            </div>

        </div>
        <div class="mb-4 w-3/5 m-auto">
            <div>
                <input type="file" name="fileImage" required="true" id="fileImageClone" onchange=" ImageFile()"
                    style="border:0;">
            </div>
            <img class="w-40 border border-gray-300 mt-4" id="hinhanh" src="/img/{{ $infor->HinhAnh }}">
            <div class="hidden" id="displayImage" style="width: 10rem;border:1px solid #ccc; margin-top:1rem;"></div>
        </div>
        <!-- <div class=" mb-4">
                                <span class="italic">Nếu muốn thêm ảnh để mô tả sản phẩm thì vui lòng bấm vào đây
                                </span>
                                <div class="w-full flex space-x-4 text-sm mt-6">
                                    <div class="w-1/4">
                                        <div>
                                            Ảnh 1
                                        </div>
                                        <div class="mt-4">
                                            <input type="file" name="fileImage" required="true" id="fileImage"
                                                onchange="ImagesFileAsURL()" style="border:0;">
                                        </div>
                                    </div>
                                    <div class="w-1/4">
                                        <div>
                                            Ảnh 2
                                        </div>
                                        <div class="mt-4">
                                            <input type="file" name="fileImage" required="true" id="fileImage"
                                                onchange="ImagesFileAsURL()" style="border:0;">
                                        </div>
                                    </div>
                                    <div class="w-1/4">
                                        <div>
                                            Ảnh 3
                                        </div>
                                        <div class="mt-4">
                                            <input type="file" name="fileImage" required="true" id="fileImage"
                                                onchange="ImagesFileAsURL()" style="border:0;">
                                        </div>
                                    </div>
                                    <div class="w-1/4">
                                        <div>
                                            Ảnh 4
                                        </div>
                                        <div class="mt-4">
                                            <input type="file" name="fileImage" required="true" id="fileImage"
                                                onchange="ImagesFileAsURL()" style="border:0;">
                                        </div>
                                    </div>
                                </div>
                            </div> -->
        <div class="flex space-x-4 mb-4">
            <div>
                <span class="font-bold" style="color:#2e6da4;">Trạng Thái </span>
            </div>
            <div>
                <select class="border border-gray-300 w-40 h-10 rounded-md px-4 ml-11">
                    <option value="">Còn Hàng</option>
                    <option value="">Hết Hàng</option>
                </select>
            </div>
        </div>
        <div class="ml-32 mt-12 mb-4 pr-4">
            <button class="pl-8 pr-8 pb-1 pt-1 text-white ml-4" type="button"
                style="background-color: #2e6da4;border:1px solid #2e6da4;"
                onclick="editProduct('{{$infor->IDSanPham}}')">Lưu</button>
            <button class=" pl-8 pr-8 pb-1 pt-1 text-current ml-4" type="button" style="border:1px solid #ccc;"
                onclick="closeModalEditProduct()">Bỏ qua</button>
        </div>
    </div>
    @endforeach
</form>