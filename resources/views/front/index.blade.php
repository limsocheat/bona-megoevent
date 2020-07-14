@extends('layouts.app')

@section('title', 'Home')

@section('content')

@include('front.components.slider')
<div class="container">
	<div class="row my-4">
		<div class="col-md-12">
			<h1 class="text-left pl-0 mb-3 font-weight-bold" id="h1">Filter Events</h1>
		</div>
		@include('front.components.filter')
	</div>
	<div class="row my-4">
		<div class="col-md-12">
			<h1 class="text-left pl-0 mb-3 font-weight-bold" id="h1" style="margin-top: -19px;">Latest Events</h1>
		</div>
		@foreach ($events as $event)
		<div class="col-md-3 mb-2">
			@include('front.components.event.card')
		</div>
		@endforeach
	</div>
	<div class="row my-4">
		<div class="col-md-12">
			<h1 class="text-left pl-0 mb-3 font-weight-bold" id="h1" style="margin-top: -9px;">Upcoming Events</h1>
		</div>
		@foreach ($feature_events as $event)
		<div class="col-md-3">
			@include('front.components.event.card')
		</div>
		@endforeach
	</div>

	<div class="row my-4">
		<div class="col-md-12">
			<h1 class="text-left pl-0 mb-3 font-weight-bold" id="h1">Featured Exhibitors</h1>
		</div>
		@foreach ($exhibitors as $exhibitor)
		<div class="col-md-3 mb-4">
			@include('front.components.exhibitor.card')
		</div>
		@endforeach
	</div>
</div>
@endsection