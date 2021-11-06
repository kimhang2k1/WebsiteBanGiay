<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/logo.png" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/tailwind.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/tab.js"></script>
    <script src="/js/product.js"></script>
    <title>Sản Phẩm - MONA SNEAKER </title>
</head>

<body>
    @include('/component/header')
    <div class="w-full border-b-2 border-gray-200 ">
        <div class="w-4/5 m-auto leading-10 text-sm">
            <p><a href="#">Trang Chủ</a>&nbsp;&nbsp;<i class="  fas fa-chevron-right"></i>&nbsp;&nbsp;<a href="#">Sản
                    Phẩm</a></p>
        </div>
    </div>
    <div class="w-full mt-8">
        <div class="w-4/5 m-auto flex space-x-8">
            <div class="w-1/5 border-r border-gray-300 pr-4">
                <div class="w-full">
                    <div class="w-full">
                        <p class="font-bold text-base">DANH MỤC</p>
                    </div>
                    <div class="w-full text-sm mt-4">
                        <ul class="leading-8">
                            <li>Trang Chủ</li>
                            <li>Giới Thiệu</li>
                            <li>Sản Phẩm</li>
                            <li>Tin Tức</li>
                            <li>Liên Hệ</li>
                        </ul>
                    </div>
                </div>
                <div class="w-full mt-16">
                    <div class="w-full">
                        <p class="font-bold text-base">LOẠI SẢN PHẨM</p>
                    </div>
                    <div class="w-full text-sm mt-4">
                        <div class="content-product leading-8">
                            @php
                            $path = url()->current();
                            @endphp
                            @if (count(explode('/',parse_url($path)['path'])) == 3)
                            @php
                            $id = explode('/',parse_url($path)['path'])[2]
                            @endphp
                            @foreach($category as $c)
                            <p><input type="radio" name="categoryProduct" class="mr-4" value="{{ $c->IDNhomSP}}"
                                    onchange="getCategoryProduct('{{ $id }}')">{{ $c->TenNhom }}</p>
                            @endforeach
                            @else
                            @foreach($category as $c)
                            <p><input type="radio" name="categoryProduct" class="mr-4" value="{{ $c->IDNhomSP}}"
                                    onchange="getCategoryProduct()">{{ $c->TenNhom }}</p>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="w-full mt-16">
                    <div class="w-full">
                        <p class="font-bold text-base">THƯƠNG HIỆU</p>
                    </div>
                    <div class="w-full text-sm mt-4">
                        <div class="content-brand leading-8 overflow-auto h-40">
                            @php
                            $path = url()->current();
                            @endphp
                            @if (count(explode('/',parse_url($path)['path'])) == 3)
                            @php
                            $id = explode('/',parse_url($path)['path'])[2]
                            @endphp
                            @foreach($brand as $br)
                            <p><input type="radio" name="brandProduct" class="mr-4" value="{{ $br->IDThuongHieu}}"
                                    onchange="getBrand('{{ $id }}')">{{ $br->TenThuongHieu}}</p>
                            @endforeach
                            @else
                            @foreach($brand as $br)
                            <p><input type="radio" name="brandProduct" class="mr-4" value="{{ $br->IDThuongHieu}}"
                                    onchange="getBrand('')">{{ $br->TenThuongHieu}}</p>
                            @endforeach
                            @endif

                        </div>
                    </div>
                </div>
                <div class="w-full mt-16">
                    <div class="w-full">
                        <p class="font-bold text-base">GIÁ SẢN PHẨM</p>
                    </div>
                    <div class="w-full text-sm mt-4">
                        <ul class="leading-8 overflow-auto h-40">
                            @php
                            $path = url()->current();
                            @endphp
                            @if (count(explode('/',parse_url($path)['path'])) == 3)
                            @php
                            $id = explode('/',parse_url($path)['path'])[2]
                            @endphp
                            <li><input type="radio" name="price" value="0-500000" onChange="onChangePrice(event)"
                                    class="mr-4">Dưới 500.000đ</li>
                            <li><input type="radio" name="price" onChange="onChangePrice(event, '{{ $id}}')"
                                    value="500000-1000000" class="mr-4">500.000đ -
                                1.000.000đ</li>
                            <li><input type="radio" name="price" onChange="onChangePrice(event, '{{ $id}}')"
                                    value="1000000-2000000" class="mr-4">1.000.000đ -
                                2.000.000đ
                            </li>
                            <li><input type="radio" name="price" onChange="onChangePrice(event, '{{ $id}}')"
                                    value="2000000-3000000" class="mr-4">2.000.000đ -
                                3.000.000đ
                            </li>
                            <li><input type="radio" name="price" onChange="onChangePrice(event, '{{ $id}}')"
                                    value="3000000-4000000" class="mr-4">3.000.000đ -
                                4.000.000đ
                            </li>
                            <li><input type="radio" name="price" value="500000" class="mr-4"
                                    onChange="onChangePrice(event, '{{ $id}}')">4.000.000đ - 5.000.000đ
                            </li>
                            <li><input type="radio" name="price" value="500000" class="mr-4"
                                    onChange="onChangePrice(event, '{{ $id}}')">Trên 5.000.000đ</li>
                            @else
                            <li><input type="radio" name="price" value="0-500000" onChange="onChangePrice(event)"
                                    class="mr-4">Dưới 500.000đ</li>
                            <li><input type="radio" name="price" onChange="onChangePrice(event)" value="500000-1000000"
                                    class="mr-4">500.000đ -
                                1.000.000đ</li>
                            <li><input type="radio" name="price" onChange="onChangePrice(event)" value="1000000-2000000"
                                    class="mr-4">1.000.000đ -
                                2.000.000đ
                            </li>
                            <li><input type="radio" name="price" onChange="onChangePrice(event)" value="2000000-3000000"
                                    class="mr-4">2.000.000đ -
                                3.000.000đ
                            </li>
                            <li><input type="radio" name="price" onChange="onChangePrice(event)" value="3000000-4000000"
                                    class="mr-4">3.000.000đ -
                                4.000.000đ
                            </li>
                            <li><input type="radio" name="price" value="500000" class="mr-4"
                                    onChange="onChangePrice(event)">4.000.000đ - 5.000.000đ
                            </li>
                            <li><input type="radio" name="price" value="500000" class="mr-4"
                                    onChange="onChangePrice(event)">Trên 5.000.000đ</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="w-4/5">
                <div class="w-full flex">
                    <div class="w-1/2">
                        <img src="/img/banner_1.jpg">
                    </div>
                    <div class="w-1/2">
                        <img src="/img/banner_2.jpg">
                    </div>
                </div>
                <div class="w-full mt-4">
                    <div class="w-full flex text-sm">
                        <div class="w-4/5 flex">
                            <div class="mr-4 leading-9">
                                <p class="font-bold">SẮP XẾP THEO </p>
                            </div>
                            <div>
                                @php
                                $path = url()->current();
                                @endphp
                                @if (count(explode('/',parse_url($path)['path'])) == 3)
                                @php
                                $id = explode('/',parse_url($path)['path'])[2]
                                @endphp
                                <select class="border border-gray-300 h-8 w-60 pl-4" id="sort" name="sort"
                                    onchange="sortByProduct('{{$id }}')">
                                    <option value="Mới Nhất">Mới Nhất</option>
                                    <option value="ASC">Giá (Từ Thấp Đến Cao)
                                    </option>
                                    <option value="DESC">Giá (Từ Cao Đến Thấp)
                                    </option>
                                    <option value="A-Z">Thứ Tự Từ A-Z</option>
                                    <option value="z-A">Thứ Tự Từ Z-A</option>
                                </select>
                                @else
                                <select class="border border-gray-300 h-8 w-60 pl-4" id="sort"
                                    onchange="sortByProduct('')">
                                    <option value="Mới Nhất">
                                        Mới Nhất</option>
                                    <option value="ASC">Giá (Từ Thấp Đến Cao)
                                    </option>
                                    <option value="DESC">Giá (Từ Cao Đến Thấp)
                                    </option>
                                    <option value="A-Z">Thứ Tự Từ A-Z</option>
                                    <option value="z-A">Thứ Tự Từ Z-A</option>
                                </select>
                                @endif
                            </div>
                        </div>
                        <div class="w-1/5">
                            <p class="text-gray-400">{{ count($productbyID)}} sản phẩm</p>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="all-product w-full flex mt-4 flex-wrap justify-between">
                            @include('/component/Product/allProduct', ['productbyID' => $productbyID])
                        </div>
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