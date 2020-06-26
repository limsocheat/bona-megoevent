@extends('layouts.app')

@section('content')

@include('front.components.slider')
<div class="container">
	{{-- <div class="row my-4">
		<div class="col-md-12">
			<h1 class="text-left pl-0 mt-5 mb-3 font-weight-bold" id="h1">Our Partners</h1>
		</div>
		@include('front.components.exhibitors')
	</div> --}}
	<div class="row my-4">
		<div class="col-md-12">
			<h1 class="text-left pl-0 mt-5 mb-3 font-weight-bold" id="h1">Filter Events</h1>
		</div>
		@include('front.components.filter')
	</div>
	<div class="row my-4">
		<div class="col-md-12">
			<h1 class="text-left pl-0 mt-5 mb-3 font-weight-bold" id="h1">Latest Events</h1>
		</div>
		@foreach ($events as $event)
		<div class="col-md-3 mb-4">
			@include('front.components.event.card')
		</div>
		@endforeach
	</div>
	<div class="row my-2">
		<div class="col-md-12">
			<h1 class="text-left pl-0 mt-5 mb-3 font-weight-bold" id="h1">Highlighted Events</h1>
		</div>
		@foreach ($feature_events as $event)
		<div class="col-md-3 mb-4">
			@include('front.components.event.card')
		</div>
		@endforeach
	</div>

	<div class="row my-2">
		<div class="col-md-12">
			<h1 class="text-left pl-0 mt-5 mb-3 font-weight-bold" id="h1">Featured Exhibitors</h1>
		</div>
		@foreach ($exhibitors as $exhibitor)
		<div class="col-md-3 mb-4">
			<div class="card border-light">
				<img src="{{ asset($exhibitor->logo) }}" alt="{{ $exhibitor->name }}" class="card-img-top" style="width: auto; height:172px;">
				<div class="card-body">
					<h3 class="card-title multi-line-truncate" id="h3" style="max-lines: 2">{{ $exhibitor->name }}
					</h3>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection