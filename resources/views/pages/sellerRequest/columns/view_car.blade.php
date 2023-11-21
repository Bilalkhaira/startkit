<!-- <a href="{{ route('cars.show' ,$user->id) }}">{{$user}}</a> -->
<div class="d-flex align-items-center">
    <div class="symbol symbol-50px me-3">
        <img src="{{ asset('images/'.$user->car_img ?? '') }}" class="" alt="" />
    </div>
    <div class="d-flex justify-content-start flex-column">
        <a href="{{ route('cars.show' ,$user->car_id) }}" id="car_view" class="text-gray-800 fw-bold mb-1 fs-6">{{ $user->car_name ?? ''}}</a>
        <span class="text-gray-400 fw-semibold d-block fs-7">{{ $user->car_price ?? ''}} $</span>
    </div>
    
</div>