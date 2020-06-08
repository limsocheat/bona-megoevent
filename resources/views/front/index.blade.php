@extends('layouts.app')

@section('content')
    
        <div class="">
			@include('front.components.slider')
		</div>

	<div class="container">
		<div class="row my-4">
			<div class="col-md-12">
				<h2 class="text-left">Our Partners</h2>
			</div>
			@include('front.components.exhibitors')
		</div>
		<div class="row my-4">
			<div class="col-md-12">
				<h2 class="text-left">Filter Events</h2>
			</div>
			@include('front.components.filter')
		</div>
		<div class="row my-4">
			<div class="col-md-12">
				<h2 class="text-left">Latest Events</h2>
			</div>
			@foreach ($events as $event)
				<div class="col-md-3 mb-4">
					<div class="card">
						<img src="{{ asset($event->image) }}" alt="{{ $event->name }}" class="card-img-top">
						<div class="card-body">
							<h5 class="card-title text-truncate" style="max-lines: 2">{{ $event->name }}</h5>
							<p class="card-text text-truncate">{!! $event->description !!}</p>
						</div>
					</div>
				</div>
			@endforeach
		</div>
		<div class="row my-2">
			<div class="col-md-12">
				<h2 class="text-left">Highlighted Events</h2>
			</div>
			@foreach ($feature_events as $event)
				<div class="col-md-3 mb-4">
					<div class="card border-light">
						<img src="{{ asset($event->image) }}" alt="{{ $event->name }}" class="card-img-top">
						<div class="card-body">
							<h5 class="card-title text-truncate" style="max-lines: 2">{{ $event->name }}</h5>
							<p class="card-text text-truncate">{!! $event->description !!}</p>
						</div>
					</div>
				</div>
			@endforeach
		</div>

		<div class="row my-2">
			<div class="col-md-12">
				<h2 class="text-left">Featured Exhibitors</h2>
			</div>
			@foreach ($exhibitors as $exhibitor)
				<div class="col-md-3 mb-4">
					<div class="card border-light">
						<img src="{{ asset($exhibitor->logo) }}" alt="{{ $exhibitor->name }}" class="card-img-top">
						<div class="card-body">
							<h5 class="card-title text-truncate" style="max-lines: 2">{{ $exhibitor->name }}</h5>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection