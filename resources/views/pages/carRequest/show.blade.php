<x-default-layout>

    @section('title')
    Dream Car Request
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('car-request-view') }}
    @endsection


    <div class="card">
        <div class="card-body py-4">
            <div class="row mb-3">
                <div class="col-md-2"><b>Vehicle Name</b></div>
                <div class="col-md-10">{{ json_decode($carRequest->data)->car_name ?? ''}}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2"><b>Rental Type</b></div>
                <div class="col-md-10">{{ json_decode($carRequest->data)->rental_type ?? ''}}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2"><b>Budget</b></div>
                <div class="col-md-10">{{ json_decode($carRequest->data)->budget ?? ''}} $</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2"><b>Name</b></div>
                <div class="col-md-10">{{ json_decode($carRequest->data)->name ?? ''}}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2"><b>Email</b></div>
                <div class="col-md-10">{{ json_decode($carRequest->data)->email ?? ''}}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2"><b>Contact Info</b></div>
                <div class="col-md-10">{{ json_decode($carRequest->data)->phone ?? ''}}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2"><b>Message</b></div>
                <div class="col-md-10">{{ json_decode($carRequest->data)->message ?? ''}}</div>
            </div>










        </div>
    </div>
    @push('scripts')

    @endpush


</x-default-layout>