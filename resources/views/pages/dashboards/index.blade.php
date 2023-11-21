<x-default-layout>

    @section('title')
        Dashboard
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('dashboard') }}
    @endsection

    <!--begin::Row-->
    <div class="row">
        <!--begin::Col-->
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3">
            @include('partials/widgets/cards/_widget-21')
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3">
            @include('partials/widgets/cards/_widget-19')
        </div>

        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3">
            @include('partials/widgets/cards/_widget-20')
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3">
            @include('partials/widgets/cards/_widget-17')
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10" style="margin-top:-130px">
        <!--begin::Col-->
       
        <!--begin::Col-->
        <div class="col-xl-12">
            @include('partials/widgets/tables/_widget-14')
        </div>

        <div class="col-xl-12">
            @include('partials/widgets/tables/_car_request')
        </div>

        <div class="col-xl-12">
            @include('partials/widgets/tables/_seller_request')
        </div>

        <div class="col-xl-12">
            @include('partials/widgets/tables/_contact_request')
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

   
</x-default-layout>
