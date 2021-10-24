<div class="form-add-cart w-2/5 m-auto border border-gray-300 p-4 absolute top-64 bg-white hidden"
    style="top:10rem;left:28rem;">
    <div class="w-full">
        <h2 class="text-xl font-bold text-center">Thêm Địa Chỉ Mới</h2>
    </div>
    <div class="w-full flex space-x-4 px-12 mt-8 mb-4 text-sm">
        <div>
            <input class="w-60 h-10 border border-gray-300 pl-4 " type="text" name="customer_name"
                placeholder="Họ và Tên">
        </div>
        <div>
            <input class="w-60 h-10 border border-gray-300 pl-4 " type="text" name="customer_phone"
                placeholder="Số điện thoại">
        </div>
    </div>
    <fieldset class="border border-gray-300 h-12 text-sm m-auto ml-12 px-2 text-gray-400 relative" style="width: 85%;">
        <legend>Tỉnh/Thành Phố, Quận/Huyện,Phường/Xã</legend>
        <div class="input_address w-full">
            <div class="w-full flex">
                <div class="w-4/5" onclick="openBoxTab()">
                    <div class="text-black leading-6 flex">
                        <span class="pr-1" id="city_address"></span>
                        <span class="pr-1 leading-6" id="district_address"></span>
                        <span class="leading-6" id="village"></span>

                    </div>
                </div>
                <div class="w-1/5 flex justify-end">
                    <div class="w-2/5">
                        <i class="far fa-times-circle"></i>
                    </div>
                    <div class="w-3/15" onclick="closeTab()">
                        <i class="fas fa-caret-down"></i>
                    </div>
                </div>



            </div>
            <div class="text-black border border-gray-300 bg-white absolute hidden" style="width: 30.85rem;
                    left:0;top:1.75rem;" id="box_address">
                <div class="tag w-full flex space-x-4 h-8 border-b border-gray-300 mt-4">
                    <div class="tab_address w-120 text-center  " onclick="openTabAddress(event, 'city')">Tỉnh/Thành
                        Phố</div>
                    <div class="tab_address w-120 text-center pointer-events-none"
                        onclick="openTabAddress(event, 'district')">
                        Quận/Huyện</div>
                    <div class="tab_address w-120 text-center pointer-events-none"
                        onclick="openTabAddress(event, 'commune')">Phường/Xã
                    </div>
                </div>
                <div class="tab_content w-full h-64 overflow-y-scroll p-4 leading-10" id="city">
                    @foreach($city as $c)
                    <option class="tab_city w-full hover:bg-gray-300" id="{{$c->IDThanhPho}}TP"
                        onclick="getDistrict('{{ $c->IDThanhPho }}')" value="{{$c->IDThanhPho}}">
                        {{ $c->TenThanhPho}}
                    </option>
                    @endforeach
                </div>
                <div class="tab_content w-full h-64 overflow-y-scroll p-4 leading-10 hidden" id="district">
                    @foreach($district as $d)
                    <option class="tab-district w-full hover:bg-gray-300" id="{{$d->IDQuan}}district"
                        onclick="getCommune('{{$d->IDQuan}}')" value="{{$d->IDQuan}}">
                        {{ $d->TenQuan }}
                    </option>
                    @endforeach
                </div>
                <div class=" tab_content w-full h-64 overflow-y-scroll p-4 leading-10 hidden" id="commune">
                    @foreach($commune as $c)
                    <option class="tab_commune w-full hover:bg-gray-300" id="{{$c->IDXa}}commune"
                        onclick="getValue('{{$c->IDXa}}')" value="{{ $c->IDXa }}">{{ $c->TenXa}}
                    </option>
                    @endforeach
                </div>
            </div>
    </fieldset>
    <div class="w-full text-sm px-12 mt-4 mb-4 ">
        <input class=" h-10 border border-gray-300 pl-4 " style="width: 31rem;" type="text" name="apartment_number"
            placeholder="Địa Chỉ cụ thể">
    </div>
    <div class="w-full px-12 mt-4 mb-4">
        <div class="w-full text-sm">
            Loại địa chỉ
        </div>
        <div class="w-full flex text-sm mt-2 space-x-4">
            <div class="border border-gray-300 leading-10 px-4">Nhà Riêng</div>
            <div class="border border-gray-300 leading-10 px-4">Văn Phòng</div>
        </div>
    </div>
    <div class="w-full px-12 mt-4 mb-4 text-gray-400 text-sm">
        <input type="checkbox" name="" id="">
        Đặt làm địa chỉ mặc định
    </div>
    <div class="w-full  px-12 mt-4 mb-4 flex justify-end text-sm">
        <div class="leading-8 pr-4 cursor-pointer" onclick="closeDeliveryAddress()">Trở lại</div>
        <div>
            <button class="w-40 h-8 border border-gray-300 bg-13283f text-white" type="submit">Hoàn
                Thành</button>
        </div>
    </div>
</div>