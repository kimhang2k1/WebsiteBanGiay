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
    <script src="./js/tab.js"></script>
    <script src="./js/cart.js"></script>
    <title>Giỏ Hàng</title>
</head>

<body>
    @include('/component/header')
    <div class="w-full border-b-2 border-gray-200 ">
        <div class="w-4/5 m-auto leading-10 text-sm">
            <p><a href="#">Trang Chủ</a>&nbsp;&nbsp;<i class="  fas fa-chevron-right"></i>&nbsp;&nbsp;<a href="#">Giỏ
                    Hàng</a></p>
        </div>
    </div>
    <div class="w-full mt-8">
        <div class="w-4/5 m-auto">
            <div class="w-full">
                <h2 class="font-bold text-xl">Giỏ Hàng Của Bạn</h2>
            </div>
            @if(count($shoppingCart) > 0)
            <div class="w-full" id="container">
                @include('/component/all_product_cart', ['shoppingCart' => $shoppingCart])
            </div>
            @else
            <div class="w-full" id="container">
                @include('/component/form-not-cart', ['shoppingCart' => $shoppingCart])
            </div>
            @endif
        </div>
    </div>
    <div class="content w-full h-screen fixed top-0 right-0 bg-black bg-opacity-50 hidden" id="my-cart">
        @include('/component/box_cart')
    </div>
    @include('/component/footer')
</body>

</html>