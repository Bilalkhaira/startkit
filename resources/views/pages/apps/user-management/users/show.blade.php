<x-default-layout>

    @section('title')
    Users
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('user-management.users.show', $user) }}
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
                            @if(!empty($user->avatar))
                            <img src="{{ asset('images/profile/'.$user->avatar) }}" alt="image" />
                            @else
                            @if($user->profile_photo_url)
                            <img src="{{ $user->profile_photo_url }}" alt="image" />
                            @else
                            <div class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', $user->name) }}">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                            @endif
                            @endif
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Name-->
                        <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">{{ $user->name }}</a>
                        <!--end::Name-->
                        <!--begin::Position-->
                        <div class="mb-9">
                            @foreach($user->roles as $role)
                            <!--begin::Badge-->
                            <div class="badge badge-lg badge-light-primary d-inline">{{ ucwords($role->name) }}</div>
                            <!--begin::Badge-->
                            @endforeach
                        </div>

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
                                <h2 class="mb-1">User's Details</h2>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_details">Edit</a>
                            </div>
                        </div>
                        <div class="card-body p-9 pt-4">
                            <div class="separator"></div>
                            <!--begin::Details content-->
                            <div id="kt_user_view_details" class="collapse show">
                                <div class="pb-5 fs-6">
                                    <!--begin::Details item-->
                                    <div class="row">
                                        <div class="col-md-3"><div class="fw-bold mt-5">Account ID</div></div>
                                        <div class="col-md-9"><div class="text-gray-600 mt-5">{{ $user->id ?? '' }}</div></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3"><div class="fw-bold mt-5">Name</div></div>
                                        <div class="col-md-9"><div class="text-gray-600 mt-5">{{ $user->name ?? '' }}</div></div>
                                    </div>
                                    
                                    <div class="row mt-5 mb-5">
                                        <div class="col-md-3"><div class="fw-bold mt-5">Email</div></div>
                                        <div class="col-md-9"> <div class="text-gray-600 mt-5">
                                        <a href="#" class="text-gray-600 mt-5 text-hover-primary">{{ $user->email ?? '' }}</a>
                                    </div></div>
                                    </div>
                                    <div class="row mt-5 mb-5">
                                        <div class="col-md-3"> <div class="fw-bold mt-5">Address</div></div>
                                        <div class="col-md-9"> <div class="text-gray-600 mt-5">{{ $user->address ?? '' }}
                                    </div></div>
                                    </div>
                                    <div class="row mt-5 mb-5" style="display: none;">
                                        <div class="col-md-3"><div class="fw-bold mt-5">Language</div></div>
                                        <div class="col-md-9"><div class="text-gray-600 mt-5">{{ $user->language ?? '' }}</div></div>
                                    </div>
                                    <div class="row mt-5 mb-5" style="display: none;">
                                        <div class="col-md-3"> <div class="fw-bold mt-5">Last Login</div></div>
                                        <div class="col-md-9"><div class="text-gray-600 mt-5">{{ $user->last_login ?? '' }}</div></div>
                                    </div>
                                    <div class="row mt-5 mb-5">
                                        <div class="col-md-3"> <div class="fw-bold mt-5">Description</div></div>
                                        <div class="col-md-9"><div class="text-gray-600 mt-5">{{ $user->description ?? '' }}</div></div>
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
    <!--end::Layout-->
    <!--begin::Modals-->
    <!--begin::Modal - Update user details-->
    @include('pages.apps/user-management/users/modals/_update-details')
    <!--end::Modal - Update user details-->
    <!--begin::Modal - Add schedule-->
    @include('pages.apps/user-management/users/modals/_add-schedule')
    <!--end::Modal - Add schedule-->
    <!--begin::Modal - Add one time password-->
    @include('pages.apps/user-management/users/modals/_add-one-time-password')
    <!--end::Modal - Add one time password-->
    <!--begin::Modal - Update email-->
    @include('pages.apps/user-management/users/modals/_update-email')
    <!--end::Modal - Update email-->
    <!--begin::Modal - Update password-->
    @include('pages.apps/user-management/users/modals/_update-password')
    <!--end::Modal - Update password-->
    <!--begin::Modal - Update role-->
    @include('pages.apps/user-management/users/modals/_update-role')
    <!--end::Modal - Update role-->
    <!--begin::Modal - Add auth app-->
    @include('pages.apps/user-management/users/modals/_add-auth-app')
    <!--end::Modal - Add auth app-->
    <!--begin::Modal - Add task-->
    @include('pages.apps/user-management/users/modals/_add-task')
    <!--end::Modal - Add task-->
    <!--end::Modals-->
</x-default-layout>