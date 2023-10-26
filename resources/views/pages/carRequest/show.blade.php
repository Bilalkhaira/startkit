<x-default-layout>

    @section('title')
    Car Request
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('car-request') }}
    @endsection


    <div class="card">
        <div class="card-body py-4">
            <div class="row mb-3">
                <div class="col-md-2"><b>Vehicle Name</b></div>
                <div class="col-md-10">{{ $carRequest->car_name ?? ''}}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2"><b>Rental Type</b></div>
                <div class="col-md-10">{{ $carRequest->rental_type ?? ''}}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2"><b>Budget</b></div>
                <div class="col-md-10">{{ $carRequest->budget ?? ''}} $</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2"><b>Name</b></div>
                <div class="col-md-10">{{ $carRequest->name ?? ''}}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2"><b>Email</b></div>
                <div class="col-md-10">{{ $carRequest->email ?? ''}}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2"><b>Contact Info</b></div>
                <div class="col-md-10">{{ $carRequest->phone ?? ''}}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2"><b>Message</b></div>
                <div class="col-md-10">{{ $carRequest->message ?? ''}}</div>
            </div>










        </div>
    </div>
    @push('scripts')

    @endpush


</x-default-layout>