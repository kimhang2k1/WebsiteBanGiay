<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/tailwind.css">
    <script src="/js/Admin/admin.js"></script>
    <title>Quản lý danh mục sản phẩm</title>
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
                            <span class=" text-sm">Trà Thị Kim Hằng</span>
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
                        <div class="w-full flex py-4 pl-4 space-x-4 text-sm hover:bg-gray-200">
                            <div>
                                <i class="fa fa-table"></i>
                            </div>
                            <div>
                                <span>Quản lý sản phẩm</span>
                            </div>
                        </div>
                    </a>
                    <a href="{{ url('/admin/category-management') }}">
                        <div class="w-full flex py-4 pl-4  bg-gray-200 space-x-4 text-sm  hover:bg-gray-200">
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
                <div class="w-full flex border border-gray-300 shadow pr-4 py-4">
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
                <div class="w-full border-2 border-gray-100 bg-white font-timenewroman management-category">
                    <div class="form">
                        <h2 class="p-4 text-xl font-bold">Quản Lí Danh Mục Sản Phẩm</h2>
                    </div>
                    <div class="w-full px-4 flex">
                        <div class="pl-4 flex" style="width: 70%;">
                            <div class="input-search mr-1">
                                <input class="text-sm pl-4 w-60 leading-8 rounded-md border border-gray-300" type="text"
                                    name="search_category" placeholder="Mã / Tên Sản Phẩm"
                                    oninput="getSearchCategory()">
                            </div>
                        </div>
                        <div class="flex" style="width: 30%;">
                            <div class="insert ">
                                <button class="ring-2 text-white w-60 leading-8 rounded-sm text-sm"
                                    style="background-color:#2e6da4;" type="button" onclick="openFormAdd('category')">
                                    <i class="fas fa-plus-circle"></i> &nbsp;&nbsp;Thêm danh mục sản phẩm</button>
                            </div>
                        </div>
                    </div>
                    <div class="px-4" id="page_category">
                        @include('Admin/component/CategoryProduct', ['category'=>$category])
                    </div>
                </div>
                <div class="form-add-category w-1/2 mt-6 px-4 m-auto hidden">
                    <div class="title w-full font-serif p-4 text-black">
                        <h2 class="text-2xl font-bold">Thêm Danh Mục Sản Phẩm Mới</h2>
                    </div>
                    <div class="container w-full mt-4 font-timenewroman pl-4 mt-6 pb-12">
                        <div class="flex space-x-10 mb-4">
                            <div>
                                <span class="font-bold" style="color:#2e6da4;">Mã Nhóm </span>
                            </div>
                            <div>
                                <input class="w-96 border border-gray-300 leading-10 rounded-md pl-4" type="text"
                                    id="IDNSP" value="{{ $allCategory[0]->IDNhomSP  }}" disabled>
                            </div>
                        </div>
                        <div class="flex space-x-8 mb-4">
                            <div>
                                <span class="font-bold" style="color:#2e6da4;">Tên Nhóm </span>
                            </div>
                            <div>
                                <input class="w-96 money border border-gray-300 rounded-md leading-10 pl-4" type="text"
                                    name="group" placeholder="Nhập tên nhóm sản phẩm">
                            </div>
                        </div>
                        <div class="ml-32 mt-12 mb-4 pr-4">
                            <button class="pl-8 pr-8 pb-1 pt-1 text-white ml-4" type="button"
                                style="background-color: #2e6da4;border:1px solid #2e6da4;"
                                onclick="addCategoryProduct()">Lưu</button>
                            <button class=" pl-8 pr-8 pb-1 pt-1 text-current ml-4" type="button"
                                style="border:1px solid #ccc;" onclick="closeModalAdd('category')">Bỏ qua</button>
                        </div>
                    </div>
                </div>
                <div class="form-edit-category w-1/2 mt-6 px-4 m-auto hidden">
                    @include('/Admin/component/FormEditCategoryProduct', ['informationCategory'=> $informationCategory])
                </div>
            </div>
        </div>
    </div>
</body>

</html>