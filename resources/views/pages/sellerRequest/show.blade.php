<x-default-layout>

    @section('title')
    Seller Request
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('seller-request') }}
    @endsection


    <div class="card">
        <div class="card-body py-4">
            <div class="row mb-3">
                <div class="col-md-2"><b>Seller Name</b></div>
                <div class="col-md-10">{{ $sellerRequest->name ?? ''}}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2"><b>Seller Email</b></div>
                <div class="col-md-10">{{ $sellerRequest->email ?? ''}}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2"><b>Seller Phone</b></div>
                <div class="col-md-10">{{ $sellerRequest->phone ?? ''}} $</div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-2"><b>Seller Message</b></div>
                <div class="col-md-10">{{ $sellerRequest->message ?? ''}}</div>
            </div>


        </div>
    </div>
    @push('scripts')

    @endpush


</x-default-layout>