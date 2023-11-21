<x-default-layout>

    @section('title')
    Blogs
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('blogs-view') }}
    @endsection

    <!--begin::Layout-->
    <div class="d-flex flex-column flex-lg-row">
        <!--begin::Sidebar-->
        <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
            <!--begin::Card-->
            <div class="card mb-5 mb-xl-8">
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin::Summary-->
                    <!--begin::User Info-->
                    <div class="d-flex flex-center flex-column py-5">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-100px symbol-circle mb-7">
                            <img src="{{ asset('images/blog/'.$blog->img) }}" alt="image" />
                            
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Name-->
                        <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">{{ $blog->title }}</a>
                        <!--end::Name-->
                        <!--begin::Position-->
                       

                    </div>
                
                </div>
                <!--end::Card body-->
            </div>

        </div>
        <!--end::Sidebar-->
        <!--begin::Content-->
        <div class="flex-lg-row-fluid ms-lg-15">
            <!--begin:::Tabs-->

            <!--end:::Tabs-->
            <!--begin:::Tab content-->
            <div class="tab-content">
                <!--begin:::Tab pane-->
                <div class="tab-pane fade show active" id="kt_user_view_overview_tab" role="tabpanel">
                    <!--begin::Card-->
                    <div class="card card-flush mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header mt-6">
                            <!--begin::Card title-->
                            <div class="card-title flex-column">
                                <h2 class="mb-1">Blog's Details</h2>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                          
                        </div>
                        <div class="card-body p-9 pt-4">
                            <div class="separator"></div>
                            <!--begin::Details content-->
                            <div id="kt_user_view_details" class="collapse show">
                                <div class="pb-5 fs-6">
                                    <!--begin::Details item-->
                                    <div class="row">
                                        <div class="col-md-3"><div class="fw-bold mt-5">Blog ID</div></div>
                                        <div class="col-md-9"><div class="text-gray-600 mt-5">{{ $blog->id ?? '' }}</div></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3"><div class="fw-bold mt-5">Title</div></div>
                                        <div class="col-md-9"><div class="text-gray-600 mt-5">{{ $blog->title ?? '' }}</div></div>
                                    </div>
                                    <div class="row mt-5 mb-5">
                                        <div class="col-md-3"> <div class="fw-bold mt-5">Description</div></div>
                                        <div class="col-md-9"><div class="text-gray-600 mt-5">{{ $blog->description ?? '' }}</div></div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--end:::Tab content-->
        </div>

    </div>
  
</x-default-layout>