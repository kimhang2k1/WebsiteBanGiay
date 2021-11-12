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
    <script src="./js/product.js"></script>
    <script src="./js/event_address.js"></script>
    <title>Thanh Tóan - Mona Sneaker </title>
</head>

<body>
    @include('/User/component/Header/header')
    <div class="w-full mt-4">
        <div class="w-4/5 m-auto">
            @if(count($address) < 0) @include('/User/component/Cart/box_cart') <div
                class="form-add-cart w-2/5 m-auto border border-gray-300 p-4 absolute top-64 bg-white" id="myModal"
                style="top:10rem;left:28rem;display: block;">
                @include('/User/component/Address/form_add_address', ['city' => $city, 'district'=>$district,
                'commune'=>
                $commune])
        </div>

        @else
        @if(count($addressDefault) > 0)
        <div class="default-address w-full border border-gray-300 p-4 leading-10 h-32" id="addressDefault">
            @include('/User/component/Address/default_address', ['addressDefault' => $addressDefault ])

        </div>
        <div class="delivery-address w-full border border-gray-300 p-4 mt-4 hidden" id="allMyAddress">
            @include('/User/component/Address/delivery_address', ['address' => $address, 'addressDefault' =>
            $addressDefault])
        </div>
        <div class="form-add-cart w-2/5 m-auto border border-gray-300 p-4 absolute top-64 bg-white" id="myModal"
            style="top:10rem;left:28rem;display: none;">
            @include('/User/component/Address/form_add_address', ['city' => $city, 'district'=>$district, 'commune'=>
            $commune])
        </div>
        @else
        <div class="default-address w-full border border-gray-300 p-4 leading-10 h-32 hidden" id="addressDefault">
            @include('/User/component/Address/default_address', ['addressDefault' => $addressDefault ])

        </div>
        <div class="delivery-address w-full border border-gray-300 p-4 mt-4 block" id="allMyAddress">
            @include('/User/component/Address/delivery_address', ['address' => $address, 'addressDefault' =>
            $addressDefault
            ])
        </div>
        @endif
        @endif
        <form method="GET" action="/check-out">
            <div class="w-full mt-4 border border-gray-300 border-b-0 p-4">
                <div class="w-full flex">
                    <div class="w-3/5">
                        Sản Phẩm
                    </div>
                    <div class="w-1/5 text-sm text-gray-400 text-center">Đơn Giá</div>
                    <div class="w-1/5 text-sm text-gray-400 text-center">Số Lượng</div>
                    <div class="w-1/5 text-sm text-gray-400 text-center">Thành Tiền</div>
                </div>
                <div class="w-full">
                    @foreach($payment as $pay)
                    <div class="w-full flex text-sm" style="line-height: 7rem;">
                        <div class="w-3/5 flex space-x-4">
                            <div class="w-1/5">
                                <img class="w-24" src="./img/{{ $pay->HinhAnh }}">
                            </div>
                            <div class="w-2/5 truncate  pr-4">{{ $pay->TenSP }}
                            </div>
                            <div class="w-2/5 leading-none pt-12 text-gray-500">
                                <p>Size:{{ $pay->SoSize}}</p>
                            </div>
                        </div>
                        <div class=" w-1/5 text-center">
                            <strike class="text-gray-600">{{ number_format($pay->GiaSP) }}</strike>
                            <span class="text-red-500 font-bold">{{ number_format( $pay->GiaSP * 0.9) }}</span>

                        </div>
                        <div class="w-1/5 text-center">{{ $pay->SoLuong}}</div>
                        <div class="w-1/5 text-center">{{ number_format($pay->SoLuong * ($pay->GiaSP *0.9)) }}</div>

                    </div>
                    @endforeach
                </div>
            </div>
            <div class="w-full flex px-4 h-24 border border-gray-300  " style="background-color: #fafdff;">
                <div class="w-2/5 border-dashed border border-gray-300 h-24 mb-4 leading-8 pt-4 border-l-0 ">
                    <div class="text-sm">
                        Lời nhắn: &nbsp;&nbsp; <input class="w-80 h-12 border border-gray-300 text-sm pl-4" type="text"
                            name="" placeholder="Lưu ý cho người bán">
                    </div>
                </div>
                <div class="w-3/5 flex px-4 leading-20 text-sm  border-dashed border border-gray-300 border-r-0  ">
                    <div class="w-4/5 ">Đơn vị vận chuyển: <span class="pl-4">Giao Hàng Nhanh</span></div>
                    <div class="w-1/5 text-red-600 pl-8">32.000đ</div>
                </div>
            </div>
            <?php
            $sum  = 0;
            foreach ($payment as $key => $value) {
                $totalMoney = ($payment[$key]->GiaSP * 0.9) * $payment[$key]->SoLuong;
                $sum += $totalMoney;
            }
            ?>
            <div class="w-full mt-4 border border-gray-300 pb-8 " style="background-color: #fffefb;">
                <div class="w-full  flex space-x-8 leading-8 pt-4 justify-end  pr-16 ">
                    <div class="text-gray-500" style="font-size: 14px;">
                        <div>Tổng Tiền Hàng</div>
                        <div>Phí vận chuyển</div>
                        <div>Tổng thanh toán</div>
                    </div>
                    <div class="text-gray-500" style="font-size: 14px;">
                        <div>{{ number_format($sum) }}</div>
                        <div>32.000đ</div>
                        <div class="text-red-600 text-xl">{{ number_format($sum + 32000)}}</div>
                    </div>
                </div>
                <div class="w-full flex justify-end mt-4 pr-16">
                    <button class="w-48 h-8 border border-gray-300 bg-13283f text-white" type="submit">Đặt Hàng</button>
                </div>
            </div>
        </form>
    </div>
    </div>


    @include('/User/component/Footer/footer')
    <div class="content w-full h-screen fixed top-0 right-0 bg-black bg-opacity-50" style="display: none;">
        @include('/User/component/Cart/box_cart')
    </div>
    @if(count($address) > 0)
    <div class="form-add-cart w-2/5 m-auto border border-gray-300 p-4 absolute top-64 bg-white" id="myModal"
        style="top:10rem;left:28rem;display: none;">
        @include('/User/component/Address/form_add_address', ['city' => $city, 'district'=>$district, 'commune'=>
        $commune])
    </div>
    @else
    <div class="form-add-cart w-2/5 m-auto border border-gray-300 p-4 absolute top-64 bg-white" id="myModal"
        style="top:10rem;left:28rem;display: block;">
        @include('/User/component/Address/form_add_address', ['city' => $city, 'district'=>$district, 'commune'=>
        $commune])
    </div>
    @endif
</body>

</html>