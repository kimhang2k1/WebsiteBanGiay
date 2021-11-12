<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/logo.png" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/tailwind.css">
    <title>Liên Hệ - MONA SNEAKER</title>
</head>

<body>
    @include('/User/component/Header/header')
    <div class="w-full mt-10">
        <div class="w-4/5 m-auto">
            <div class="w-full flex space-x-4">
                <div class="w-1/2">
                    <div class="w-full">
                        <h2 class="font-bold text-xl">THÔNG TIN LIÊN HỆ</h2>
                    </div>
                    <div class="w-full my-4">
                        <ul class="leading-8">
                            <li><i class="pr-4 fas fa-map-marker-alt"></i> Thăng Bình, Quảng Nam</li>
                            <li><i class="pr-4 fas fa-phone"></i> 0987654321</li>
                            <li><i class="pr-4 fas fa-envelope"></i> ttkhang.19i@cit.udn.vn</li>
                            <li><i class="pr-4 fab fa-skype"></i> pehang</li>
                        </ul>
                    </div>
                </div>
                <div class="w-1/2">
                    <div class="w-full flex space-x-4">
                        <div>
                            <input class="border border-gray-300 w-60 text-sm leading-8 pl-4" type="text" name="HoTen"
                                placeholder="Họ và Tên">
                        </div>
                        <div>
                            <input class="border border-gray-300 w-60 text-sm leading-8 pl-4" type="email" name="Email"
                                placeholder="Email">
                        </div>
                    </div>
                    <div class="w-full flex space-x-4 my-4">
                        <div>
                            <input class="border border-gray-300 w-60 text-sm leading-8 pl-4" type="text" name="HoTen"
                                placeholder="Số điện thoại">
                        </div>
                        <div>
                            <input class="border border-gray-300 w-60 text-sm leading-8 pl-4" type="text" name="Email"
                                placeholder="Địa Chỉ">
                        </div>
                    </div>
                    <div class="w-full flex space-x-4 my-4">
                        <textarea class="border border-gray-300 pl-4 pt-4 text-sm h-32" placeholder="Lời nhắn"
                            style="width: 31rem;"></textarea>
                    </div>
                    <div class="w-full flex my-4">
                        <button type="button" class="border border-gray-300 px-4 text-sm py-2 bg-12283e text-white">Gửi
                            đi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('/User/component/Footer/footer')
</body>

</html>