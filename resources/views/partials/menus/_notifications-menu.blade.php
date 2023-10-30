<!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true" id="kt_menu_notifications">
	<!--begin::Heading-->
	<div class="d-flex flex-column bgi-no-repeat rounded-top" style="background-color: #1d3059">
		<!--begin::Title-->
		<h3 class="text-white fw-semibold px-9 mt-10 mb-6">Dream Car Request Notifications

	</div>
	<div class="scroll-y mh-325px my-5 px-8">
		@foreach(auth()->user()->unreadNotifications as $notification)
		<div class="d-flex flex-stack py-4">
			<div class="d-flex align-items-center">
				
				<div class="mb-0 me-2">
					<a href="{{ route('car-request.show', $notification->id) }}" class="fs-6 text-gray-800 text-hover-primary fw-bold">{{ $notification->data['name'] }}</a>
					<div class="text-gray-400 fs-7">{{ $notification->data['rental_type'] }}</div>
				</div>
			</div>
			<span class="badge badge-light fs-8">{{ $notification->created_at->diffForHumans() }}</span>
		</div>
		@endforeach
	</div>
	<div class="py-3 text-center border-top">
		<a href="{{ route('car-request.index') }}" class="btn btn-color-gray-600 btn-active-color-primary">View All {!! getIcon('arrow-right', 'fs-5') !!}</a>
	</div>

</div>