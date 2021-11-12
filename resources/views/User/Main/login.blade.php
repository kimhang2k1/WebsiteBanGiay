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
    <title>Đăng Nhập - MONA SNEAKER</title>
</head>

<body>
    @include('/User/component/Header/header')
    <div class="w-full mt-4">
        <div class="w-4/5 m-auto">
            <div class="w-2/5 border border-gray-300 m-auto p-4 bg-f9f9f9">
                <div class="w-full">
                    <h2 class="font-bold text-2xl text-center">Đăng Nhập</h2>
                </div>
                <form action="handle-login" method="post">
                    {{ csrf_field() }}
                    <div class="w-full my-8 ml-8">
                        <div class="w-full">
                            <p class="font-bold text-sm">Email *</p>
                        </div>
                        <div class="w-full">
                            <input class="border border-gray-300 h-10 w-96 mt-2 pl-4 text-sm " type="email" name="email"
                                value="@isset($login){{$login['email']}}@endisset">
                        </div>
                        <p class="error-message pl-4 text-sm text-red-700 mt-2">{{ $errors->first('email') }}</p>
                        </p>
                        @if (session('status1'))
                        <p class="error-message pl-4 text-sm text-red-700 mt-2">{{ session('status1') }}</p>
                        </p>
                        @endif
                    </div>
                    <div class="w-full my-8 ml-8">
                        <div class="w-full">
                            <p class="font-bold text-sm">Mật Khẩu *</p>
                        </div>
                        <div class="w-full">
                            <input class="border border-gray-300 h-10 w-96 mt-2 pl-4 text-sm " type="password"
                                name="password" value="@isset($login){{$login['password']}}@endisset">
                        </div>
                        <p class="error-message pl-4 text-sm text-red-700 mt-2">{{ $errors->first('password') }}</p>
                        </p>
                        @if (session('status2'))
                        <p class="error-message pl-4 text-sm text-red-700 mt-2">{{ session('status2') }}</p>
                        </p>
                        @endif
                    </div>
                    <div class="w-full">
                        <p class="text-sm text-center"><a href="#">Quên mật khẩu?</a></p>
                    </div>
                    <div class="w-full mt-4">
                        <button class="border border-gray-300 bg-13283f text-white w-96 h-12 ml-8" type="submit">Đăng
                            Nhập</button>
                    </div>
                    <div class="w-full text-center mt-4">
                        <p class="text-sm">Nếu chưa có tài khoản, bấm <a class="text-red-600" href="#">Đăng ký</a></p>
                    </div>
                </form>

            </div>
        </div>
        @include('/User/component/Footer/footer')
</body>

</html>