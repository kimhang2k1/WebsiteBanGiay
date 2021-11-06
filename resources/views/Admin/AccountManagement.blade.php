<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
    <link rel="stylesheet" href="/css/tailwind.css">
    <title>Quản Lí Tài Khoản</title>
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
                    <div class="w-full flex py-4 pl-4 space-x-4 bg-gray-200 text-sm hover:bg-gray-200">
                        <div>
                            <i class="fas fa-home"></i>
                        </div>
                        <div>
                            <span>Bảng Điều Khiển</span>
                        </div>
                    </div>
                    <div class="w-full flex py-4 pl-4 space-x-4 text-sm hover:bg-gray-200">
                        <div>
                            <i class="fa fa-table"></i>
                        </div>
                        <div>
                            <span>Quản lý sản phẩm</span>
                        </div>
                    </div>
                    <div class="w-full flex py-4 pl-4 space-x-4 text-sm  hover:bg-gray-200">
                        <div>
                            <i class="fa fa-list-ul"></i>
                        </div>
                        <div>
                            <span>Quản lý danh mục sản phẩm</span>
                        </div>
                    </div>
                    <div class="w-full flex py-4 pl-4 space-x-4 text-sm  hover:bg-gray-200">
                        <div>
                            <i class="fas fa-box"></i>
                        </div>
                        <div>
                            <span>Quản lý đơn hàng</span>
                        </div>
                    </div>
                    <div class="w-full flex py-4 pl-4 space-x-4 text-sm  hover:bg-gray-200">
                        <div>
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <span>Quản lý tài khoản</span>
                        </div>
                    </div>
                    <div class="w-full flex py-4 pl-4 space-x-4 text-sm  hover:bg-gray-200">
                        <div>
                            <i class="fas fa-users"></i>
                        </div>
                        <div>
                            <span>Quản lý khách hàng</span>
                        </div>
                    </div>
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
                <div class="border border-gray-100 bg-white font-timenewroman managements" style="width: 78rem;">
                    <div class="form">
                        <h2 class="p-4 text-xl font-bold">Quản Lí Tài Khoản</h2>
                    </div>
                    <div class="w-full flex">
                        <div class="pl-4 flex">
                            <div class="input-search mr-1">
                                <input class="text-sm pl-4 w-60 leading-8 rounded-md border border-gray-300" type="text"
                                    name="search_account" placeholder="Mã Khách Hàng" oninput="SearchAccount()">
                            </div>
                        </div>
                    </div>
                    <div class="px-4" id="page_account">
                        @include('Admin/component/AccountCustomer')
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>