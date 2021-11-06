<div class="w-full">
    <h2 class="text-xl font-bold text-center">Chỉnh Sửa Địa Chỉ Cá Nhân</h2>
</div>
<div class="print-error-msg" style="display:none;">
    <ul class="w-96 ml-12 pl-4 text-left bg-red-300 border border-red-300 rounded-lg text-sm text-red-500">
    </ul>
</div>
<form action="">
    @foreach($infor as $inf)
    <div class="w-full flex space-x-4 px-12 mt-8 mb-4 text-sm">
        <div>
            <input class="check w-60 h-10 border border-gray-300 pl-4 " type="text" name="HoTen" placeholder="Họ và Tên"
                onchange="stateHandle(this)" value="{{ $inf->HoTen }}" required />
            @error('HoTen')
            <span> {{ $message }}</span>
            @enderror
        </div>
        <div>
            <input class=" check w-60 h-10 border border-gray-300 pl-4 " type="text" name="SDT"
                placeholder="Số điện thoại" onchange="stateHandle(this)" value="0{{ $inf->SDT}}" required />
        </div>
    </div>
    <fieldset class="border border-gray-300 h-12 text-sm m-auto ml-12 px-2 text-gray-400 relative" style="width: 85%;">
        <legend>Tỉnh/Thành Phố, Quận/Huyện,Phường/Xã</legend>
        <div class="input_address w-full">
            <div class="w-full flex">
                <div class="w-4/5" onclick="openBoxTab()">
                    <div class="baby text-black leading-6 flex">
                        <option class=" pr-1" id="city_address" value="{{ $inf->IDThanhPho}}">{{ $inf->TenThanhPho}},
                        </option>
                        <option class=" pr-1 leading-6" id="district_address" value="{{ $inf->IDQuan}}">
                            {{ $inf->TenQuan}},
                        </option>
                        <option class=" leading-6" id="village" value="{{ $inf->IDXa}}">{{ $inf->TenXa}}</option>
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
        <input class="check h-10 border border-gray-300 pl-4 " style="width: 31rem;" type="text" name="SoNha"
            placeholder="Địa Chỉ cụ thể" onchange="stateHandle(this)" value="{{ $inf->SoNha}}" required />
    </div>
    <!-- <div class="w-full px-12 mt-4 mb-4">
            <div class="w-full text-sm">
                Loại địa chỉ
            </div>
            <div class="w-full flex text-sm mt-2 space-x-4">
                <div class="border border-gray-300 leading-10 px-4">Nhà Riêng</div>
                <div class="border border-gray-300 leading-10 px-4">Văn Phòng</div>
            </div>
        </div> -->
    <div class="w-full  px-12 mt-4 mb-4 flex justify-end text-sm">
        <div class="leading-8 pr-4 cursor-pointer" onclick="closeAddress()">Trở lại</div>
        <div>
            <button type="submit"
                class="btn_add w-40 h-8 border border-gray-300 bg-13283f cursor-not-allowed text-white"
                onclick="editToAddress(event, '{{ $inf->IDDiaChi}}')" disabled>Hoàn
                Thành</button>
        </div>
    </div>
    @endforeach
</form>