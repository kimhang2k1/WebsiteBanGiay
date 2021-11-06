<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
    <link rel="stylesheet" href="/css/tailwind.css">
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
                            <span class=" text-sm">Trà Thị Kim Hằng</span>
                        </div>
                        <div class="w-full">
                            <span class="text-xs">admin@gmail.com</span>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-16">
                    <div class="w-full mb-4 pl-4">
                        <span class="font-bold">CHỨC NĂNG HỆ THỐNG</span>
                    </div>
                    <a href="{{ url('/admin/home') }}">
                        <div class="w-full flex py-4 pl-4 space-x-4 bg-gray-200 text-sm hover:bg-gray-200">
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
                    <a href="">
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
                <div class="w-full border-2 border-gray-100 bg-white font-timenewroman managements">
                    <div class="form">
                        <h2 class="p-4 text-xl font-bold">Quản Lí Danh Mục Sản Phẩm</h2>
                    </div>
                    <div class="w-full flex">
                        <div class="pl-4 flex" style="width: 80%;">
                            <div class="input-search mr-1">
                                <input class="text-sm pl-4 w-60 leading-8 rounded-md border border-gray-300" type="text"
                                    name="search_category" placeholder="Mã / Tên Sản Phẩm" oninput="SearchCategory()">
                            </div>
                        </div>
                    </div>
                    <div class="px-4" id="page_category">
                        @include('Admin/component/CategoryProduct', ['category'=>$category])
                    </div>


                </div>
            </div>
        </div>
    </div>
</body>

</html>