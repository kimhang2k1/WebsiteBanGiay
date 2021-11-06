<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src='Chart.min.js'></script>
    <link rel="stylesheet" href="/css/tailwind.css">
    <script src="/js/chart.js"></script>
    <title>Trang Chủ</title>
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
                            <span class=" text-sm">{{ Session::get('admin')[0]->Ten }}</span>
                        </div>
                        <div class="w-full">
                            <span class="text-xs">{{ Session::get('admin')[0]->Email }}</span>
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
                <div class="w-full">
                    <div class=" managements" id="statistical">
                        <div class="w-full flex justify-evenly  m-4 font-timenewroman space-x-8">
                            <div class="w-1/4 rounded-lg pl-4 pt-8 pb-8 pr-4 text-right text-white text-xl shadow-2xl flex"
                                style="background-image: linear-gradient(to right, #664dc9, #9884ea);">
                                <div class="w-1/4 pt-3">
                                    <i class="mt-5 text-3xl fas fa-hockey-puck"></i>
                                </div>
                                <div class="w-3/4 ">
                                    <span class="text-3xl">0</span>
                                    <p class="text-base">Tổng sản phẩm</p>
                                </div>
                            </div>
                            <div class="w-1/4 rounded-lg  pt-8 pb-8 pr-4 text-right text-white text-xl shadow-2xl flex"
                                style=" background-image:linear-gradient(to right, #1D976C, #2fd38a)">
                                <div class="w-2/12 pt-4">
                                    <i class="mt-4 text-2xl fas fa-calendar-alt"></i>
                                </div>
                                <div class="w-4/5 ">
                                    <span class="text-3xl">0</span>
                                    <p class="text-base">Doanh thu trong ngày</p>
                                </div>
                            </div>
                            <div class="w-1/4 rounded-lg pt-8 pb-8 pr-4 text-right text-white text-xl shadow-2xl flex"
                                style="background-image: linear-gradient(to right, #fa5420, #f6a800);">
                                <div class="w-2/12 pt-4">
                                    <i class="mt-4 text-2xl fas fa-clipboard-list"></i>
                                </div>
                                <div class="w-4/5 ">
                                    <span class="text-3xl">0</span>
                                    <p class="text-base">Tổng Hóa Đơn Trong Ngày</p>
                                </div>

                            </div>
                            <div class="w-1/4 rounded-lg pt-8 pb-8 pr-4 text-right text-white text-xl shadow-2xl flex"
                                style="background-image: linear-gradient(to right, #5b73e8, #44c4fa);">
                                <div class="w-2/12 pt-4">
                                    <i class="mt-4 text-2xl fas fa-users"></i>
                                </div>
                                <div class="w-4/5 ">
                                    <span class="text-3xl"> 0</span>
                                    <p class="text-base">Tổng Khách Hàng </p>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="flex mt-6 px-4">
                        <div class="w-1/2">
                            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                        </div>
                        <div class="w-1/2 mt-1">
                            <canvas id="oilChart" width="600" height="400"></canvas>
                        </div>

                    </div>
                    <div class="w-full">
                        <p class="text-center font-bold font-timenewroman text-base">Các Đơn Hàng Trong
                            Ngày Hôm Nay</p>
                        <div class="max-w-full overflow-x-auto ml-1 mt-4 font-timenewroman"
                            style="border:1px solid #ccc;border:1px solid #ccc;width: 95%;">
                            <table class="w-full text-xs">
                                <tr class="font-bold">
                                    <td>ID Đơn Hàng</td>
                                    <td>Tên Khách Hàng</td>
                                    <td>SĐT</td>
                                    <td>Địa Chỉ Giao Hàng</td>
                                    <td>Tên Sản Phẩm</td>
                                    <td>Size</td>
                                    <td>Số Lượng</td>
                                    <td>Ngày Đặt Hàng</td>
                                </tr>
                                <tr>
                                    <td>DH10000001</td>
                                    <td>Nguyễn Thị Thiên Kim</td>
                                    <td>098765432</td>
                                    <td>Tổ 1 Thôn Đồng Dương, xã Bình Định Bắc, huyện Thăng Bình,Tỉnh Quảng Nam</td>
                                    <td>Giày Fila</td>
                                    <td>38</td>
                                    <td>1</td>
                                    <td>2021-11-05</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
</body>
<script>
var xValues = [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150];
var yValues = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15];

new Chart("myChart", {
    type: "line",
    data: {
        labels: xValues,
        datasets: [{
            fill: false,
            lineTension: 0,
            backgroundColor: "rgba(0,0,255,1.0)",
            borderColor: "rgba(0,0,255,0.1)",
            data: yValues
        }]
    },
    options: {
        legend: {
            display: false
        },
        scales: {
            yAxes: [{
                ticks: {
                    min: 6,
                    max: 16
                }
            }],
        }
    }
});
var oilCanvas = document.getElementById("oilChart");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 18;

var oilData = {
    labels: [
        "Chưa Giao Hàng",
        "Đã Giao Hàng",
        "Đã Hủy",
    ],
    datasets: [{
        data: [133.3, 86.2, 52.2],
        backgroundColor: [
            "#FF6384",
            "#63FF84",
            "#664dc9",
        ]
    }]
};

var pieChart = new Chart(oilCanvas, {
    type: 'pie',
    data: oilData
});
</script>


</html>