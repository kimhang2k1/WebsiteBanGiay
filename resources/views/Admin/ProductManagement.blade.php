<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/tailwind.css">
    <link rel="stylesheet" href="/css/admin.css">
    <script src="/js/admin/admin.js"></script>
    <title>Quản lý sản phẩm</title>
</head>

<body>
    <div class="w-full">
        <div class="w-full flex ">
            <div class="h-screen border border-gray-300 shadow" style="width: 18%;">
                <div class="w-full mt-4">
                    <span class="font-bold px-2"> MONASNEAKER MANAGEMENT</span>
                </div>
                <div class="w-full flex mt-8 pl-4 hover:bg-gray-200">
                    <div>
                        <img class="w-12" src=/img/user.png>
                    </div>
                    <div class="ml-3 mt-1">
                        <div class="w-full">
                            <span class="text-sm">Trà Thị Kim Hằng</span>
                        </div>
                        <div class="w-full">
                            <span class="text-xs">hangtea@gmail.com</span>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-16">
                    <div class="w-full mb-4 pl-4">
                        <span class="font-bold">CHỨC NĂNG HỆ THỐNG</span>
                    </div>
                    <a href="{{ url('/admin/dashboard') }}">
                        <div class="w-full flex py-4 pl-4 space-x-4 text-sm hover:bg-gray-200">
                            <div>
                                <i class="fas fa-home"></i>
                            </div>
                            <div>
                                <span>Bảng Điều Khiển</span>
                            </div>
                        </div>
                    </a>
                    <a href="{{ url('/admin/product-management') }}">
                        <div class="w-full flex py-4 bg-gray-200 pl-4 space-x-4 text-sm hover:bg-gray-200">
                            <div>
                                <i class="fa fa-table"></i>
                            </div>
                            <div>
                                <span>Quản lý sản phẩm</span>
                            </div>
                        </div>
                    </a>
                    <a href="{{ url('/admin/category-management') }}">
                        <div class="w-full flex py-4 pl-4 space-x-4 text-sm  hover:bg-gray-200">
                            <div>
                                <i class="fa fa-list-ul"></i>
                            </div>
                            <div>
                                <span>Quản lý danh mục sản phẩm</span>
                            </div>
                        </div>
                    </a>
                    <a href="{{ url('/admin/order-management') }}">
                        <div class="w-full flex py-4 pl-4 space-x-4 text-sm  hover:bg-gray-200">
                            <div>
                                <i class="fas fa-box"></i>
                            </div>
                            <div>
                                <span>Quản lý đơn hàng</span>
                            </div>
                        </div>
                    </a>
                    <a href="{{ url('/admin/account-management') }}">
                        <div class="w-full flex py-4 pl-4 space-x-4 text-sm  hover:bg-gray-200">
                            <div>
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <span>Quản lý tài khoản</span>
                            </div>
                        </div>
                    </a>
                    <a href="{{ url('/admin/customer-management') }}">
                        <div class="w-full flex py-4 pl-4 space-x-4 text-sm  hover:bg-gray-200">
                            <div>
                                <i class="fas fa-users"></i>
                            </div>
                            <div>
                                <span>Quản lý khách hàng</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="w-4/5">
                <div class="flex border border-gray-300 shadow pr-4 py-4" style="width: 78rem;">
                    <div class="w-1/2 pl-4 pt-1">
                        <i class="text-gray-600 fas fa-align-left"></i>
                    </div>
                    <div class="w-1/2 flex justify-end space-x-8">
                        <div>
                            <i class="mt-2 text-xl fas fa-bell"></i>
                        </div>
                        <div>
                            <i class="mt-2 text-xl fas fa-envelope"></i>
                        </div>
                        <div>
                            <i class="mt-2 text-xl fas fa-sign-out-alt">
                            </i>
                        </div>
                        <div>
                            <img class="w-8" src="/img/user.png">
                        </div>
                    </div>
                </div>
                <div class="border border-gray-100 bg-white font-timenewroman management-product" style="width: 78rem;">
                    <div class="form">
                        <h2 class="p-4 text-xl font-bold">Quản Lí Sản Phẩm</h2>
                    </div>
                    <div class="w-full flex px-4">
                        <div class="pl-4 flex" style="width: 70%;">
                            <div class="input-search">
                                <input class=" text-sm pl-4 w-60 leading-8 rounded-md border border-gray-300"
                                    type="text" name="search" placeholder="Mã / Tên Sản Phẩm"
                                    oninput="getSearchProductInShop()">
                            </div>
                            <div class="select">
                                <select
                                    class="text-sm category-product border border-gray-300 w-40 mx-4 pl-4 rounded-md "
                                    style="height:35px;" name="category" onchange="getSearchProductInShop()">
                                    <option value="">Tất Cả</option>
                                    @foreach($category as $c)
                                    <option value="{{ $c->IDNhomSP }}">{{ $c->TenNhom }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="flex justify-end" style="width: 30%;">
                            <div class="insert ">
                                <button class="ring-2 text-white w-40 leading-8 rounded-sm text-sm"
                                    style="background-color:#2e6da4;" type="button" onclick="openFromAdd('product')">
                                    <i class="fas fa-plus-circle"></i> &nbsp;&nbsp;Thêm sản phẩm </button>
                            </div>
                        </div>
                    </div>
                    <div class="px-4" id="product">
                        @include('Admin/component/AllProductInShop', ['product' => $product])
                    </div>
                    <div class="w-full mt-4">
                        <ul class="flex justify-center space-x-4">
                            @for($i = 0; $i <= floor($length /10 );$i++) @if($page==$i) <li
                                class="text-center border border-gray-300 rounded-full pt-1 w-8 h-8 bg-red-500 text-white">
                                <a href="<?= url('admin/product-management?page=' . $i) ?>"><?= $i ?></a>
                                </li>
                                @else
                                <li
                                    class="text-center border border-gray-300 rounded-full pt-1 w-8 h-8 bg-13283f text-white">
                                    <a href="<?= url('admin/product-management?page=' . $i) ?>"><?= $i ?></a>
                                </li>
                                @endif
                                @endfor
                        </ul>
                    </div>
                </div>
                <div class="form-add-product w-full mt-6 px-4 hidden ">
                    <div class="title w-full font-serif p-4 text-black">
                        <h2 class="text-2xl font-bold">Thêm Sản Phẩm Mới</h2>
                    </div>
                    <form action="<?= route('add-to-product-shop') ?> " method="POST" enctype="multipart/form-data"
                        id="myForm">
                        {{ csrf_field() }}
                        <div class="container w-full mt-4 font-timenewroman pl-4 mt-6 pb-12">
                            <div class="flex mb-4 space-x-16">
                                <div>
                                    <span class="font-bold" style="color:#2e6da4;"> Danh Mục </span>
                                </div>
                                <div>
                                    <select class="w-40 h-10 rounded-md px-4  border border-gray-300"
                                        name="groupProduct">
                                        @foreach($category as $nsp)
                                        <option value="{{ $nsp->IDNhomSP }}">{{ $nsp->TenNhom }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="flex space-x-5 mb-4">
                                <div>
                                    <span class="font-bold" style="color:#2e6da4;">Sản Phẩm</span>
                                </div>
                                <div>
                                    <input class="border border-gray-300 w-40 leading-10 rounded-md pl-4 ml-11"
                                        type="text" name="IDSP" value="{{ $allProduct[0]->IDSanPham  }}" disabled>
                                    <input class="border border-gray-300 rounded-md leading-10 pl-4 ml-4"
                                        style="width: 35rem;" type="text" name="nameProduct"
                                        placeholder="Nhập tên sản phẩm">
                                </div>
                            </div>
                            <div class="flex space-x-4 mb-4">
                                <div>
                                    <span class="font-bold" style="color:#2e6da4;">Thương Hiệu </span>
                                </div>
                                <div>
                                    <select class="border border-gray-300 w-40 h-10 rounded-md px-4 ml-6"
                                        name="thuongHieu">
                                        @foreach($brand as $t)
                                        <option value="{{ $t->IDThuongHieu }}">{{ $t->TenThuongHieu }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="flex space-x-8 mb-4">
                                <div>
                                    <span class="font-bold" style="color:#2e6da4;">Giá Sản Phẩm </span>
                                </div>
                                <div>
                                    <input class=" money border border-gray-300 rounded-md leading-10 pl-4"
                                        style="width: 35rem;" type="text" name="price" placeholder="Nhập giá sản phẩm">
                                </div>
                            </div>
                            <div class="flex space-x-24 mb-4">
                                <div>
                                    <span class="font-bold" style="color:#2e6da4;"> Mô tả </span>
                                </div>
                                <div>
                                    <textarea class="w-60  h-20 rounded-md" style="margin-left:4.5rem;"
                                        name="ckeditor"></textarea>
                                </div>

                            </div>
                            <div class="mb-4 w-3/5 m-auto">
                                <div>
                                    <input type="file" name="fileImage" required="true" id="fileImage"
                                        onchange="ImagesFileAsURL()" style="border:0;">
                                </div>
                                <div class="hidden" id="displayImg"
                                    style="width: 10rem;border:1px solid #ccc; margin-top:1rem;"></div>
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
                                <button class="pl-8 pr-8 pb-1 pt-1 text-white ml-4" type="submit"
                                    style="background-color: #2e6da4;border:1px solid #2e6da4;">Lưu</button>
                                <button class=" pl-8 pr-8 pb-1 pt-1 text-current ml-4" type="button"
                                    style="border:1px solid #ccc;" onclick="closeModalAdd('product')">Bỏ qua</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="form-edit-product w-full mt-6 px-4 hidden">
                    @include('/Admin/component/FormEditProduct', ['informationProduct' => $informationProduct,
                    'category' => $category , 'brand' => $brand])
                </div>

            </div>
        </div>
    </div>
    </div>
</body>
<script>
CKEDITOR.replace('ckeditor')
</script>

</html>