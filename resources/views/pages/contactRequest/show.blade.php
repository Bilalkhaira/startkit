<x-default-layout>

    @section('title')
    Contact Request
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('contact-request') }}
    @endsection


    <div class="card">
        <div class="card-body py-4">
            <div class="row mb-3">
                <div class="col-md-2"><b> Name</b></div>
                <div class="col-md-10">{{ $contactRequest->name ?? ''}}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2"><b> Email</b></div>
                <div class="col-md-10">{{ $contactRequest->email ?? ''}}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2"><b> Phone</b></div>
                <div class="col-md-10">{{ $contactRequest->phone ?? ''}} $</div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-2"><b> Message</b></div>
                <div class="col-md-10">{{ $contactRequest->message ?? ''}}</div>
            </div>


        </div>
    </div>
    @push('scripts')

    @endpush


</x-default-layout>