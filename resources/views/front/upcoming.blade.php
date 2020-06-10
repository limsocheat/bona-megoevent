
@extends('layouts.app')
@section ('title', "Upcoming")
@section('content')
	<div class="container">
		<div class="row my-4">
			@include('front.components.upcoming.banner')
		</div>
		<div class="row my-4">
			@include('front.components.filter')
		</div>
		<div class="row my-4">
			<div class="col-md-12">
				<h1 class="text-left pl-0 mt-5 mb-3 font-weight-bold">Category 1</h1>
			</div>
			@foreach ($events as $event)
				<div class="col-md-3 mb-4">
					<div class="card border-light">
						<img src="{{ asset($event->image) }}" alt="{{ $event->name }}" class="card-img-top">
						<div class="card-body">
							<div class="row">
								<div class="col-7">
									<h5 class="text-truncate text-danger text-capitalize" style="max-lines: 1; text-transform: capitalize;">{{ $event->created_at }}</h5>
								</div>
								<div class="col-5 text-right">
									<a href="#" class="btn btn-sm btn-outline-dark">Join Now</a>
								</div>
							</div>
							<h3 class="card-title text-truncate text-capitalize" style="max-lines: 2 text-transform: capitalize;">{{ $event->name }}</h3>
							<p class="card-text text-truncate textcapitalize">{!! $event->description !!}</p>
						</div>
					</div>
				</div>
			@endforeach
		</div>
		<div class="row my-4">
			<div class="col-md-12">
				<h1 class="text-left pl-0 mt-5 mb-3 font-weight-bold">Category 2</h1>
			</div>
			@foreach ($events as $event)
				<div class="col-md-3 mb-4">
					<div class="card border-light">
						<img src="{{ asset($event->image) }}" alt="{{ $event->name }}" class="card-img-top">
						<div class="card-body">
							<div class="row">
								<div class="col-7">
									<h5 class="text-truncate text-danger text-capitalize" style="max-lines: 1; text-transform: capitalize;">{{ $event->created_at }}</h5>
								</div>
								<div class="col-5 text-right">
									<a href="#" class="btn btn-sm btn-outline-dark">Join Now</a>
								</div>
							</div>
							<h3 class="card-title text-truncate text-capitalize" style="max-lines: 2 text-transform: capitalize;">{{ $event->name }}</h3>
							<p class="card-text text-truncate text-capitalize">{!! $event->description !!}</p>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection