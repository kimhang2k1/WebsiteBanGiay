<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" />
    <link rel="stylesheet" href="/css/tailwind.css">
    <title>Đăng Nhập</title>
</head>

<body style="background-color: #7f9fc0c9;">
    <div class="w-full h-screen">
        <div class="w-3/12 m-auto border border-gray-300 py-8 px-4 bg-white absolute left-1/2 rounded-md "
            style="transform: translate(-50%, 50%);">
            <div class="w-full mt-4">
                <div class="w-full">
                    <h2 class="text-center font-bold text-2xl">LOGIN</h2>
                </div>
                <form method="POST" action="/process-login">
                    {{ csrf_field() }}
                    <div class="w-80 mt-8 mb-4 m-auto ">
                        <div class="w-full border-b border-black my-8 text-sm">
                            <div class="w-full mb-2">
                                <span>Email</span>
                            </div>
                            <div class="w-full flex">
                                <i class="mt-1 fas fa-envelope"></i>
                                <input class="w-full mb-2 pl-4 ring-white" type="email" name="email" placeholder=""
                                    value="@isset($login){{$login['email']}}@endisset">
                            </div>
                            <p class="error-message pl-4 text-sm text-red-700 mt-2">{{ $errors->first('email') }}
                            </p>
                            </p>
                            @if (session('status1'))
                            <p class="error-message pl-4 text-sm text-red-700 mt-2">{{ session('status1') }}</p>
                            </p>
                            @endif

                        </div>
                        <div class="w-full border-b border-black text-sm">
                            <div class="w-full mb-2">
                                <span>Password</span>
                            </div>
                            <div class="w-full flex">
                                <i class="mt-1 fas fa-user"></i>
                                <input class="w-full mb-2 pl-4" type="password" name="password"
                                    value="@isset($login){{$login['password']}}@endisset">
                            </div>
                            <p class="error-message pl-4 text-sm text-red-700 mt-2">{{ $errors->first('password') }}
                            </p>
                            </p>
                            @if (session('status2'))
                            <p class="error-message pl-4 text-sm text-red-700 mt-2">{{ session('status2') }}</p>
                            </p>
                            @endif
                        </div>
                    </div>
                    <div class="w-full">
                        <button type="submit" class="w-72 mx-6 py-2 bg-blue-400 text-white rounded-full">Đăng
                            Nhập</button>
                    </div>
                    <div class="w-full mt-4 text-center">
                        <span class="text-gray-600 text-sm text-center">Quên mật khẩu?</span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>