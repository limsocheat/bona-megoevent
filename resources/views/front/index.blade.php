@extends('layouts.app')

@section('content')
    
	@include('front.components.slider')

	<div class="container">
		<div class="row my-4">
			<div class="col-md-12">
				<h1 class="text-left pl-0 mt-5 mb-3 font-weight-bold">Our Partners</h1>
			</div>
			@include('front.components.exhibitors')
		</div>
		<div class="row my-4">
			<div class="col-md-12">
				<h1 class="text-left pl-0 mt-5 mb-3 font-weight-bold">Filter Events</h1>
			</div>
			@include('front.components.filter')
		</div>
		<div class="row my-4">
			<div class="col-md-12">
				<h1 class="text-left pl-0 mt-5 mb-3 font-weight-bold">Latest Events</h1>
			</div>
			@foreach ($events as $event)
				<div class="col-md-3 mb-4">
					<div class="card border-light">
						<img src="{{ asset($event->image) }}" alt="{{ $event->name }}" class="card-img-top">
						<div class="card-body">
							<div class="row">
								<div class="col-7">
									<h5 class="text-truncate text-danger" style="max-lines: 1">{{ $event->created_at }}</h5>
								</div>
								<div class="col-5 text-right">
									<a href="#" class="btn btn-sm btn-outline-primary">Join Now</a>
								</div>
							</div>
							<h3 class="card-title text-truncate" style="max-lines: 2">{{ $event->name }}</h3>
							<p class="card-text text-truncate">{!! $event->description !!}</p>
						</div>
					</div>
				</div>
			@endforeach
		</div>
		<div class="row my-2">
			<div class="col-md-12">
				<h1 class="text-left pl-0 mt-5 mb-3 font-weight-bold">Highlighted Events</h1>
			</div>
			@foreach ($feature_events as $event)
				<div class="col-md-3 mb-4">
					<div class="card border-light">
						<img src="{{ asset($event->image) }}" alt="{{ $event->name }}" class="card-img-top">
						<div class="card-body">
							<div class="row">
								<div class="col-7">
									<h5 class="text-truncate text-danger" style="max-lines: 1">{{ $event->created_at }}</h5>
								</div>
								<div class="col-5 text-right">
									<a href="#" class="btn btn-sm btn-outline-primary">Join Now</a>
								</div>
							</div>
							<h3 class="card-title text-truncate" style="max-lines: 2">{{ $event->name }}</h3>
							<p class="card-text text-truncate">{!! $event->description !!}</p>
						</div>
					</div>
				</div>
			@endforeach
		</div>

		<div class="row my-2">
			<div class="col-md-12">
				<h1 class="text-left pl-0 mt-5 mb-3 font-weight-bold">Featured Exhibitors</h1>
			</div>
			@foreach ($exhibitors as $exhibitor)
				<div class="col-md-3 mb-4">
					<div class="card border-light">
						<img src="{{ asset($exhibitor->logo) }}" alt="{{ $exhibitor->name }}" class="card-img-top">
						<div class="card-body">
							<h3 class="card-title text-truncate" style="max-lines: 2">{{ $exhibitor->name }}</h3>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection