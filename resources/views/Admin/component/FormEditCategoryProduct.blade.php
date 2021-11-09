<div class="title w-full font-serif p-4 text-black">
    <h2 class="text-2xl font-bold">Chỉnh sửa Danh Mục Sản Phẩm Mới</h2>
</div>
<form action="" method="GET" enctype="multipart/form-data">
    @foreach($informationCategory as $infor)
    <div class="container w-full mt-4 font-timenewroman pl-4 mt-6 pb-12">
        <div class="flex space-x-10 mb-4">
            <div>
                <span class="font-bold" style="color:#2e6da4;">Mã Nhóm </span>
            </div>
            <div>
                <input class="w-96 border border-gray-300 leading-10 rounded-md pl-4" type="text" id="IDNSP"
                    value="{{ $infor->IDNhomSP  }}" disabled>
            </div>
        </div>
        <div class="flex space-x-8 mb-4">
            <div>
                <span class="font-bold" style="color:#2e6da4;">Tên Nhóm </span>
            </div>
            <div>
                <input class="w-96 money border border-gray-300 rounded-md leading-10 pl-4" type="text" id="group"
                    placeholder="Nhập tên nhóm sản phẩm" value="{{ $infor->TenNhom  }}">
            </div>
        </div>
        <div class="ml-32 mt-12 mb-4 pr-4">
            <button class="pl-8 pr-8 pb-1 pt-1 text-white ml-4" type="button"
                style="background-color: #2e6da4;border:1px solid #2e6da4;"
                onclick="editCategoryProduct('{{ $infor->IDNhomSP }}')">Lưu</button>
            <button class=" pl-8 pr-8 pb-1 pt-1 text-current ml-4" type="button" style="border:1px solid #ccc;"
                onclick="closeModalEditCategory()">Bỏ qua</button>
        </div>
    </div>
    @endforeach
</form>