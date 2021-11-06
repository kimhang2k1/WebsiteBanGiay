@if(count($comment) > 0)
@foreach($comment as $c)
<div class="w-full flex">
    <div class="w-12 h-12 bg-gray-200 rounded-full opacity-70">
        <img class="w-8 " style="margin-left:0.55rem;margin-top:0.35rem;" src="/img/account.png">
    </div>
    <div class="ml-2">
        <div class="w-full">
            <span class="font-bold">{{$c->Ten}}</span>
        </div>
        <div class="flex text-xs">
            @switch($c->SoSao)
            @case(1)
            <i class="fas fa-star text-yellow-500"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                class="fas fa-star"></i><i class="fas fa-star"></i>
            @break
            @case(2)
            <i class="fas fa-star text-yellow-500"></i><i class="fas fa-star text-yellow-500"></i><i
                class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            @break
            @case(3)
            <i class="fas fa-star text-yellow-500"></i><i class="fas fa-star text-yellow-500"></i><i
                class="fas fa-star text-yellow-500"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            @break
            @case(4)
            <i class="fas fa-star text-yellow-500"></i><i class="fas fa-star text-yellow-500"></i><i
                class="fas fa-star text-yellow-500"></i><i class="fas fa-star text-yellow-500"></i><i
                class="fas fa-star"></i>
            @break
            @case(5)
            <i class="fas fa-star text-yellow-500"></i><i class="fas fa-star text-yellow-500"></i><i
                class="fas fa-star text-yellow-500"></i><i class="fas fa-star text-yellow-500"></i><i
                class="fas fa-star text-yellow-500"></i>
            @break
            @endswitch
        </div>
        <div>
            <span>{{ $c->NoiDung}}</span>
        </div>
        <div class="text-gray-400 text-sm">{{ $c->NgayBinhLuan}}</div>
    </div>
</div>
@endforeach
@else
<p>Chưa có bình luận nào.</p>
@endif