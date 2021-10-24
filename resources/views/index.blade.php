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
    <script src="./js/tab.js"></script>
    <title>Mona Sneaker - Website Bán Giày Thể Thao Và Phụ Kiện Chính Hãng, Chất Lượng Cao</title>
</head>

<body>
    @include('/component/header')
    <div class="w-full mt-4">
        <div class="w-full">
            <img src="./img/slide.jpg" style="width:1519px;height: 500px;">
        </div>
    </div>
    <div class="w-full mt-4">
        <div class="w-4/5 m-auto">
            <div class="w-full mt-16">
                <div class="title">
                    <h1 class="text-center text-2xl font-bold text-gray">DANH MỤC SẢN PHẨM</h1>
                </div>
                <div class="w-full flex mt-4 space-x-16 ">
                    <div class="category w-120 relative h-96">
                        <div class=" shoes w-full mt-4 invisible">
                            <p class="text-xl font-bold text-center">GIÀY NAM</p>
                        </div>
                        <div class="images ml-12 mt-12">
                            <img src="./img/product_block_03.jpg" class="w-64">
                        </div>
                        <div
                            class="btn-preview w-full invisible transition h-full bg-black flex items-center justify-center bg-opacity-30 duration-700 ease-in-out absolute top-0 left-0">
                            <p
                                class="border-2 border-black font-bold w-56 h-10 text-18 text-center bg-black text-white leading-8 tl">
                                <a href="#">Xem Sản
                                    Phẩm</a>
                            </p>
                        </div>
                    </div>
                    <div class="category w-120 relative h-96">
                        <div class="shoes w-full mt-4 invisible">
                            <p class="text-xl font-bold text-center">GIÀY NỮ</p>
                        </div>
                        <div class="images ml-12 mt-12">
                            <img src="./img/product_block_05.jpg" class="w-64">
                        </div>
                        <div
                            class="btn-preview w-full invisible transition h-full bg-black flex items-center justify-center bg-opacity-30 duration-700 ease-in-out absolute top-0 left-0">
                            <p
                                class="border-2 border-black font-bold w-56 h-10 text-18 text-center bg-black text-white leading-8 tl ">
                                <a href="#">Xem Sản
                                    Phẩm</a>
                            </p>
                        </div>
                    </div>
                    <div class="category w-120 relative h-96">
                        <div class=" shoes w-full mt-4 invisible">
                            <p class="text-xl font-bold text-center">PHỤ KIỆN KHÁC</p>
                        </div>
                        <div class="images  ml-12 mt-12">
                            <img src="./img/product_block_07.jpg" class="w-64">
                        </div>
                        <div
                            class="btn-preview w-full invisible transition h-full bg-black flex items-center justify-center bg-opacity-30 duration-700 ease-in-out absolute top-0 left-0">
                            <p
                                class="border-2 border-black font-bold w-56 h-10 text-18 text-center bg-black text-white leading-8 tl ">
                                <a href="#">Xem Sản
                                    Phẩm</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full mt-16 flex shadow py-4 border-2 border-gray-300">
                <div class="w-1/4 leading-8 text-center">
                    <div class="w-full">
                        <img src="./img/truck.png" class="w-12 m-auto">
                    </div>
                    <div class="w-full mt-4">
                        <span>GIAO HÀNG TOÀN QUỐC</span>
                    </div>
                    <div class="w-full">
                        <span class="text-gray-400">Vận chuyển khắp Việt Nam</span>
                    </div>
                </div>
                <div class="w-1/4 leading-8 text-center">
                    <div class="w-full">
                        <img src="./img/money.png" class="w-12 m-auto">
                    </div>
                    <div class="w-full mt-4">
                        <span>THANH TOÁN KHI NHẬN HÀNG</span>
                    </div>
                    <div class="w-full">
                        <span class="text-gray-400">Nhận hàng tại nhà rồi thanh toán</span>
                    </div>
                </div>
                <div class="w-1/4 leading-8 text-center">
                    <div class="w-full">
                        <img src="./img/repair.png" class="w-12 m-auto">
                    </div>
                    <div class="w-full mt-4">
                        <span>BẢO HÀNH DÀI HẠN</span>
                    </div>
                    <div class="w-full">
                        <span class="text-gray-400">Bảo hàng lên đến 60 ngày</span>
                    </div>
                </div>
                <div class="w-1/4 leading-8 text-center">
                    <div class="w-full">
                        <img src="./img/refresh.png" class="w-12 m-auto">
                    </div>
                    <div class="w-full mt-4">
                        <span>ĐỔI HÀNG DỄ DÀNG</span>
                    </div>
                    <div class="w-full">
                        <span class="text-gray-400">Đổi hàng thoải mái trong 30 ngày</span>
                    </div>
                </div>
            </div>
            <div class="w-full mt-16 ">
                <div class="w-full text-center">
                    <span class="text-2xl font-bold ">TOP SẢN PHẨM MỚI</span>
                </div>
                <div class="w-full flex mt-16 flex-wrap justify-between space-y-4">
                    @foreach($product_new as $pr)
                    <div class="item_product w-124 text-center">
                        <div class="w-full ">
                            <a href="{{ url('product/product_detail/'.$pr->IDSanPham.'&&'.$pr->IDThuongHieu) }}">
                                <img src="./img/{{ $pr->HinhAnh}}"
                                    class="w-60 m-auto transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110"></a>

                        </div>
                        <div class="w-60 truncate mx-4 my-2">
                            <a href="{{ url('product/product_detail/'.$pr->IDSanPham.'&&'.$pr->IDThuongHieu) }}"><span
                                    class="hover:text-green-500">{{ $pr->TenSP}}</span></a>
                        </div>
                        <div class="w-72">
                            <span class="text-red-500 font-bold">{{ number_format($pr->GiaSP *0.9)}}₫ </span>
                            <strike class="text-gray-600">{{number_format($pr->GiaSP)}}₫ </strike>
                        </div>
                        <!-- <div class="btn_add_cart w-full my-4 invisible">
                            <p class="w-48 leading-8 border-2 border-red-500 text-white bg-red-500 ml-12">
                                <a href="{{ url('product/product_detail/'.$pr->IDSanPham.'&&'.$pr->IDThuongHieu) }}">Xem
                                    Chi
                                    Tiết</a>
                            </p>
                        </div> -->
                    </div>
                    @endforeach
                </div>
            </div>
            <div class=" w-full mt-16 relative">
                <div class="w-full">
                    <img src="./img/banner4_min.jpg" class="opacity-70">
                </div>
                <div class="w-full ">
                    <span class="absolute top-32 left-80 font-bold text-white text-6xl">MONA SNE<i
                            class="far fa-star"></i>KER</span>
                </div>
            </div>
            <div class="w-full mt-32 ">
                <div class="w-full text-center">
                    <span class="text-2xl font-bold ">TOP SẢN PHẨM BÁN CHẠY</span>
                </div>
                <div class="w-full flex mt-8 flex-wrap justify-between space-y-4">
                    @foreach($product_trend as $pro)
                    <div class="item_product w-124 text-center">
                        <div class="w-full ">
                            <a href=" {{url('product/product_detail/'.$pro->IDSanPham.'&&'.$pro->IDThuongHieu) }} ">
                                <img src="./img/{{ $pro->HinhAnh }}"
                                    class="w-60 m-auto transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110"></a>

                        </div>
                        <div class="w-60 truncate mx-4 my-2">
                            <a href="{{ url('product/product_detail/'.$pro->IDSanPham.'&&'.$pro->IDThuongHieu) }}">
                                <span class="hover:text-green-500">{{ $pro->TenSP }}</span></a>
                        </div>
                        <div class="w-72">
                            <span class="text-red-500 font-bold">{{ number_format( $pro->GiaSP * 0.9) }}₫ </span>
                            <strike class="text-gray-600">{{ number_format($pro->GiaSP) }}₫ </strike>
                        </div>
                        <!-- <div class="btn_add_cart w-full my-4 invisible">
                            <p class="w-48 leading-8 border-2 border-red-500 text-white bg-red-500 ml-12">
                                <a href="{{ url('product/product_detail/'.$pro->IDSanPham.'&&'.$pro->IDThuongHieu) }}">Xem
                                    Chi
                                    Tiết</a>
                            </p>
                        </div> -->
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="w-full mt-32 ">
                <div class="w-full text-center">
                    <span class="text-2xl font-bold ">TIN TỨC MỚI NHẤT</span>
                </div>
                <div class="w-full mt-8 flex space-x-16">
                    <div class="w-120  border border-gray-200 p-4">
                        <div class="w-full">
                            <img src="./img/news.jpg">
                        </div>
                        <div class="w-full my-4">
                            <span><a href="#">7 cách bảo quản giày thể thao tốt nhất</a></span>
                        </div>
                        <div class="w-full">
                            <p
                                class="border border-gray-300 bg-13283f rounded-full pl-8 w-40 leading-8 ml-20 text-white">
                                <a href="#">Xem Chi Tiết </a>
                            </p>
                        </div>
                    </div>
                    <div class="w-120 border border-gray-200 p-4">
                        <div class="w-full">
                            <img src="./img/news_2.jpg">
                        </div>
                        <div class="w-full my-4">
                            <span><a href="#">Hướng dẫn 7 cách tẩy vết ố vàng trên giày trắng tại
                                    nhà</a></span>
                        </div>
                        <div class="w-full">
                            <p
                                class="border border-gray-300 bg-13283f rounded-full pl-8 w-40 leading-8 ml-20 text-white">
                                <a href="#">Xem Chi Tiết </a>
                            </p>
                        </div>
                    </div>
                    <div class="w-120  border border-gray-200 p-4">
                        <div class="w-full">
                            <img src="./img/news_3.jpg">
                        </div>
                        <div class="w-full my-4">
                            <span><a href="#">Cách chọn giày thể thao cho người chân to như thế nào là đúng
                                    chuẩn?</a></span>
                        </div>
                        <div class="w-full">
                            <p
                                class="border border-gray-300 bg-13283f rounded-full pl-8 w-40 leading-8 ml-20 text-white">
                                <a href="#">Xem Chi Tiết </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content w-full h-screen fixed top-0 right-0 bg-black bg-opacity-50 hidden" id="my-cart">
        @include('/component/box_cart')
    </div>
    </div>
    @include('/component/footer')
</body>

</html>