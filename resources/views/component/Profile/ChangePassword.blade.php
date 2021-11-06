<form action="change-password-customer" method="POST">
    {{ csrf_field() }}
    <div class="w-4/5 m-auto leading-10 mt-4">
        <div class="w-full flex space-x-4">
            <div>
                Mật khẩu cũ :
            </div>
            <div>
                <input class="border border-gray-300 ml-3 pl-4 w-96 leading-10" type="password" name="mk">
            </div>
            <p class="error-message pl-4 text-sm text-red-700 mt-2">{{ $errors->first('mk') }}</p>
            </p>
            @if (session('status2'))
            <p class="error-message pl-4 text-sm text-red-700 mt-2">{{ session('status2') }}</p>
            </p>
            @endif
        </div>
        <div class="w-full flex mt-4  space-x-4">
            <div>
                Mật khẩu mới :
            </div>
            <div>
                <input class="border border-gray-300 pl-4 w-96 leading-10" type="password" name="mkClone">
            </div>
            <p class="error-message pl-4 text-sm text-red-700 mt-2">{{ $errors->first('mkClone') }}</p>
            </p>
        </div>
        <div class="w-full mt-4">
            <button class="border border-gray-300 bg-13283f text-white text-sm w-24 h-12 ml-32"
                type="submit">Lưu</button>
        </div>
    </div>
</form>