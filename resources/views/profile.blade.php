<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/logo.png" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/tailwind.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/event_address.js"></script>
    <script src="./js/profile.js"></script>
    <script src="./js/tab.js"></script>

    <title>Profile - Mona Sneaker</title>
</head>

<body class="bg-gray-200">
    @include('/component/header')
    <div class="w-full">
        <div class="w-360 m-auto">
            <div class="w-full flex ">
                <div class="w-1/5 mt-6">
                    <div class="w-full font-bold">
                        <span class="text-sm">Xin Chào ,</span> <span
                            class="font-normal">{{ Session::get('user')[0]->Ten}}</span>
                    </div>
                    <div class="w-full text-sm mt-8">
                        <div class="flex">
                            <div class="mr-4">
                                <i class="text-gray-500 fas fa-user-alt"></i>
                            </div>
                            <div>
                                Quản lý tài khoản
                            </div>
                        </div>
                        <div class="w-full ml-8 mt-4 leading-8">
                            <div class="w-full" onclick="openInformation(0)">
                                Thông Tin Cá Nhân
                            </div>
                            <div class="w-full" onclick="openInformation(1)">
                                Sổ Địa Chỉ
                            </div>
                        </div>
                    </div>
                    <div class="w-full text-sm mt-4" onclick="openInformation(2)">
                        <div class="flex">
                            <div class="mr-5">
                                <i class="text-gray-500 fas fa-file-invoice"></i>
                            </div>
                            <div>
                                Đơn hàng của tôi
                            </div>
                        </div>
                    </div>
                    <div class="w-full text-sm mt-4" onclick="openInformation(3)">
                        <div class="flex">
                            <div class="mr-5">
                                <i class="text-gray-500 fas fa-file-invoice"></i>
                            </div>
                            <div>
                                Đơn hàng đã hủy
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-4/5">
                    <div class="w-full bg-white mt-6">
                        <div class="information  w-full px-4 py-4">
                            <div class="w-full p-4 border-b border-gray-300">
                                <div class="w-full">
                                    <span class="text-xl">Thông Tin Cá Nhân</span>
                                </div>
                            </div>
                            <div class="w-full" id="no-edit">
                                @include('/component/Profile/Information', ['profile' => $profile])
                            </div>
                            <div class="w-full hidden" id="form-edit">
                                @include('/component/Profile/EditInformation', ['profile' => $profile])
                            </div>
                            <div class="w-full hidden" id="change-password">
                                @include('/component/Profile/ChangePassword')
                            </div>
                        </div>
                        <div class="information w-full px-4 hidden">
                            <div class="w-full p-4 ">
                                <div class="w-full">
                                    <span class="text-xl font-bold">Địa Chỉ Của Tôi</span>
                                </div>
                            </div>
                            <div class="w-full mt-8" id="allAddress">
                                @include('/component/Address/allAddress',['addressOfCustomer' =>
                                $addressOfCustomer,'addressDefault' => $addressDefault ])
                            </div>
                        </div>

                    </div>
                    <div class="w-full">
                        <div class="information w-full hidden border border-gray-300">
                            <div class="w-full p-4 pb-16 bg-white  ">
                                <div class="w-full flex justify-center">
                                    <span class="text-2xl font-bold">Đơn Hàng Của Tôi</span>
                                </div>
                            </div>
                            <div class="w-full" id="allOrder">
                                @include('/component/Profile/OrderCustomer', ['order' =>$order])
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="information w-full hidden border border-gray-300">
                            <div class="w-full p-4 pb-16 bg-white  ">
                                <div class="w-full flex justify-center">
                                    <span class="text-2xl font-bold">Danh Sách Đơn Hàng Đã Hủy</span>
                                </div>
                            </div>
                            <div class="w-full" id="allOrder">
                                @include('/component/Profile/OrderCustomerCancel')
                            </div>
                        </div>
                    </div>
                    <div class="detail-order-customer w-full hidden" id=" ">

                    </div>
                </div>

            </div>
        </div>
    </div>
    @include('/component/footer')
    <div class="content w-full h-screen fixed top-0 right-0 bg-black bg-opacity-50" style="display: none;">
        @include('/component/Cart/box_cart')
        <div class="form-edit-cart w-2/5 m-auto border border-gray-300 p-4 absolute top-64 bg-white" id="myEdit"
            style="top:10rem;left:28rem;display: none;">
            @include('/component/Address/form_edit_address', ['city' => $city, 'district'=>$district, 'commune'=>
            $commune,
            'infor' => $infor])
        </div>
    </div>

</body>

</html>