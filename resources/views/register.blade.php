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
    <title>Đăng Ký - MONA SNEAKER</title>
</head>

<body>
    @include('/component/header')
    <div class="w-full mt-4">
        <div class="w-4/5 m-auto">
            <div class="w-2/5 border border-gray-300 m-auto p-4 bg-f9f9f9">
                <div class="w-full">
                    <h2 class="font-bold text-2xl text-center">Tạo Tài Khoản</h2>
                </div>
                <form action="check-account" method="post">
                    {{ csrf_field() }}
                    <div class="w-full my-8 ml-8">
                        <div class="w-full">
                            <p class="font-bold text-sm">Họ Tên <span class="text-red-600">*</span></p>
                        </div>
                        <div class="w-full">
                            <input class="border border-gray-300 h-10 w-96 mt-2 text-sm pl-4 " type="text" name="hoTen"
                                value="@isset($register){{$register['hoTen']}}@endisset">
                        </div>
                        <p class="error-message pl-4 text-sm text-red-700 mt-2">{{ $errors->first('hoTen') }}</p>
                        </p>
                    </div>
                    <div class="w-full my-8 ml-8">
                        <div class="w-full">
                            <p class="font-bold text-sm">Số điện thoại <span class="text-red-600">*</span></p>
                        </div>
                        <div class="w-full">
                            <input class="border border-gray-300 h-10 w-96 mt-2 text-sm pl-4 " type="text" name="sdt"
                                value="@isset($register){{$register['sdt']}}@endisset">
                        </div>
                        <p class="error-message pl-4 text-sm text-red-700 mt-2">{{ $errors->first('sdt') }}</p>
                        </p>
                    </div>
                    <div class="w-full my-8 ml-8">
                        <div class="w-full">
                            <p class="font-bold text-sm">Email <span class="text-red-600">*</span></p>
                        </div>
                        <div class="w-full">
                            <input class="border border-gray-300 h-10 w-96 mt-2 text-sm pl-4 " type="email" name="email"
                                value="@isset($register){{$register['email']}}@endisset">
                        </div>
                        <p class="error-message pl-4 text-sm text-red-700 mt-2">{{ $errors->first('email') }}</p>
                        </p>
                    </div>
                    <div class="w-full my-8 ml-8">
                        <div class="w-full">
                            <p class="font-bold text-sm">Mật Khẩu <span class="text-red-600">*</span></p>
                        </div>
                        <div class="w-full">
                            <input class="border border-gray-300 h-10 w-96 mt-2 text-sm pl-4 " type="password"
                                name="password" value="@isset($register){{$register['password']}}@endisset">
                        </div>
                        <p class="error-message pl-4 text-sm text-red-700 mt-2">{{ $errors->first('password') }}</p>
                        </p>
                    </div>
                    <div class="w-full my-8 ml-8">
                        <div class="w-full">
                            <p class="font-bold text-sm">Nhập Lại Mật Khẩu <span class="text-red-600">*</span></p>
                        </div>
                        <div class="w-full">
                            <input class="border border-gray-300 h-10 w-96 mt-2 text-sm pl-4 " type="password"
                                name="password_clone" value="@isset($register){{$register['password_clone']}}@endisset">
                        </div>
                        <p class="error-message pl-4 text-sm text-red-700 mt-2">{{ $errors->first('password_clone') }}
                        </p>
                        </p>
                    </div>
                    <div class="w-full mt-4">
                        <button class="border border-gray-300 bg-13283f text-white w-96 h-12 ml-8" type="submit">Đăng
                            Ký</button>
                    </div>
                    <div class="w-full text-center mt-4">
                        <p class="text-sm">Nếu bạn đã có tài khoản, bấm <a class="text-red-600" href="#">Đăng Nhập</a>
                        </p>
                    </div>
                </form>

            </div>
        </div>
        @include('/component/footer')
</body>

</html>