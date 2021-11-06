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
    <script src="/js/tab.js"></script>
    <script src="/js/product.js"></script>
    <script src="/js/cart.js"></script>

    <title>Document</title>
</head>

<body>
    @include('component/header')
    <div class="w-full border-b-2 border-gray-200 ">
        <div class="w-4/5 m-auto leading-10 text-sm">
            <p><a href="#">Trang Chủ</a>&nbsp;&nbsp;<i class="  fas fa-chevron-right"></i>&nbsp;&nbsp;<a href="#">Giày
                    Thể
                    Thao Nữ</a></p>
        </div>
    </div>
    <div class="w-full mt-8">
        <div class="w-4/5 m-auto">
            <div class="w-full flex">
                @foreach($product as $pr)
                <div class="w-1/2 flex">

                    <div class="w-1/5">
                        <div class="space-y-8
                        ">
                            @foreach($imageDetail as $img)
                            <img class="image__detail__product active" src="/img/Image_detail/{{ $img->AnhSanPham }}"
                                onclick="displayImage(this)">

                            @endforeach

                        </div>
                    </div>
                    <div class="w-4/5">
                        <img src="/img/{{$pr->HinhAnh}}" id="images">
                    </div>
                </div>
                <div class="w-1/2">
                    <div class="w-full mb-4">
                        <p class="font-bold text-2xl">{{ $pr->TenSP }}</p>
                    </div>
                    <div class="w-full text-xl flex space-x-3">
                        <p class="font-bold text-red-600">{{ number_format($pr->GiaSP * 0.9) }}</p>
                        <strike class="text-gray-400">{{ number_format($pr->GiaSP)}}</strike>
                    </div>
                    <div class="w-full my-8">
                        <p class="font-bold text-base">Size</p>
                        <ul class="flex space-x-4 mt-2 font-bold">
                            @foreach($size as $s)
                            <li class="size__product active border border-gray-300 w-24 leading-10 text-center rounded-lg"
                                onclick="getSize(this, '{{ $s->IDSize}}') ">
                                <span>{{ $s->SoSize}}</span>
                            </li>
                            @endforeach
                        </ul>
                        <div class="error-size mt-4 text-red-500 text-sm hidden">Vui lòng chọn size giày của bạn </div>
                    </div>
                    <div class="w-full">
                        <p class="font-bold text-base">Số Lượng</p>
                        <ul class="flex mt-4">
                            <li><button class="border border-gray-300 w-8 leading-9" onclick="increase()">+</button>
                            </li>
                            <li><input type="text" name="" value="1" id="amount"
                                    class="border border-gray-300 leading-9 w-12 text-center"></li>
                            <li><button class="border border-gray-300 w-8 leading-9" onclick="decrease()">-</button>
                            </li>
                        </ul>
                    </div>
                    <input type="hidden" id="idsize" value="">
                    <div class="w-full mt-8">
                        <div class="mb-4">
                            <button onclick="addToCart('{{$pr->IDSanPham}}')"
                                class="border border-gray-300 text-white font-bold text-base bg-brown w-96 leading-10 h-12">THÊM
                                VÀO GIỎ HÀNG</button>
                        </div>
                        <div>
                            <button type="submit"
                                class="w-96 border border-gray-300 leading-10 font-bold text-white bg-black h-16 ">
                                <p class="leading-none">MUA NGAY</p>
                                <p class="font-normal text-xs">Giao tận nhà, đổi trả dễ dàng</p>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="w-full my-16 ">
                <div class=" tab w-full flex space-x-8 m-auto border-b border-gray-300 leading-6 h-12 pl-80">
                    <button class="tablinks font-bold" onclick="openTab(event, 'decription')">MÔ TẢ</button>
                    <button class="tablinks font-bold " onclick="openTab(event, 'review')">ĐÁNH GIÁ SẢN
                        PHẨM</button>
                    <button class="tablinks font-bold" onclick="openTab(event, 'policy')">CHÍNH SÁCH ĐỔI VÀ TRẢ
                        HÀNG</button>
                </div>
                <div class=" tabcontent w-full mt-4" id="decription">
                    <h2 class="font-bold">GIÀY THỜI TRANG UNISEX FILA OAKMONT TR</h2>
                    <div class="w-full mt-4">
                        <p>Đôi giày với phần đế đồ sộ cân bằng với upper bằng chất liệu cao cấp tạo nên kiểu dáng
                            sang
                            trọng nổi bật. Logo Fila trên lưỡi gà, đôi giày Fila Hypercube này dễ dàng phối hợp với
                            nhiều loại trang phục của bạn.</p>
                    </div>
                    <div class="w-full mt-4">
                        <p class="font-bold">Thông Số :</p>
                        <ul class="list-disc ml-8">
                            <li>Chất liệu: Synthetic 70%, Polyester 30%</li>
                            <li>Đế cao su bền bỉ</li>
                        </ul>
                    </div>
                </div>
                <div class=" tabcontent w-full mt-4 leading-9 hidden " id="review">
                    <div class="w-full">
                        <h2 class="font-bold text-base">Bình Luận</h2>
                        <div class="w-full mt-4" id="comment">
                            @include('/component/Product/AllComment', ['comment' => $comment])
                        </div>
                    </div>
                    <div class="w-full border border-gray-300 p-4 mt-4">
                        <div class="w-full">
                            <p class="font-bold text-base">Hãy là người bình luận đầu tiên "MONA SNEAKER"</p>
                        </div>
                        <div class="w-full mt-4">
                            <p class="font-bold">Đánh giá của bạn</p>
                            <ul class="star flex space-x-4 text-gray-300">
                                <li class="star_product active border-r border-gray-300 pr-4"
                                    onclick="getStar(this, '1')"><i class="fas fa-star"></i></li>
                                <li class="star_product active border-r border-gray-300 pr-4"
                                    onclick="getStar(this, '2')"><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                </li>
                                <li class="star_product active border-r border-gray-300 pr-4"
                                    onclick="getStar(this, '3')"><i class="fas fa-star"></i><i
                                        class="fas fa-star"></i><i class="fas fa-star"></i>
                                </li>
                                <li class="star_product active border-r border-gray-300 pr-4"
                                    onclick="getStar(this, '4')"><i class="fas fa-star"></i><i
                                        class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                </li>
                                <li class="star_product active " onclick="getStar(this, '5')"><i
                                        class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                        class="fas fa-star"></i><i class="fas fa-star"></i>
                                </li>
                            </ul>
                        </div>
                        <input type="hidden" name="" id="numberStar" value="">
                        <div class="w-full">
                            <p class="font-bold mb-4">Nhận Xét Của Bạn *</p>
                            <p><input type="text" name="comment" class="rate border border-gray-300 h-32"
                                    style="width: 50rem;">
                            </p>
                        </div>
                        <div class="w-full mt-4">
                            <button type="submit"
                                class="font-bold text-white bg-red-600 border border-red-600 w-24 text-sm h-8"
                                onclick="postCommentProduct('{{$product[0]->IDSanPham}}')">GỬI
                                ĐI</button>
                        </div>
                    </div>

                </div>
                <div class="tabcontent w-full mt-4 hidden" id="policy">
                    <div class="w-full">
                        <h2></h2>
                    </div>
                </div>
                <div class="w-full mt-32 ">
                    <div class="w-full text-center">
                        <span class="text-2xl font-bold ">SẢN PHẨM TƯƠNG TỰ</span>
                    </div>
                    <div class="w-full flex mt-8 flex-wrap justify-between">
                        @foreach($productSame as $p)
                        <div class="item_product w-1/4 text-center">
                            <div class="w-full">
                                <img src="/img/{{$p->HinhAnh}}"
                                    class="w-60 m-auto transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                            </div>
                            <div class="w-60 truncate mx-4 my-2">
                                <span>{{ $p->TenSP }}</span>
                            </div>
                            <div class="w-72">
                                <span class="text-red-500 font-bold">{{ number_format($p->GiaSP * 0.9)}}</span>
                                <strike class="text-gray-600">{{ number_format($p->GiaSP)}}</strike>
                            </div>
                            <div class="btn_add_cart w-full my-4 invisible">
                                <p class="w-48 leading-8 border-2 border-red-500 text-white bg-red-500 ml-12"><a
                                        href="">Thêm vào
                                        giỏ</a></p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="content w-full h-screen fixed top-0 right-0 bg-black bg-opacity-50 hidden" id="my-cart">
        @include('/component/Cart/box_cart')
    </div>
    @include('/component/footer')
</body>

</html>