
@extends('layouts.app')
@section ('title', "Upcoming")
@section('content')

<style>
	.multi-line-truncate {
	display: -webkit-box;
	-webkit-box-orient: vertical;
	-webkit-line-clamp: 2;
	overflow: hidden;
	}
	#card-body{
		height: 350.32px;
		transition: 0.5s;
	}
	#card-body:hover {
		box-shadow: 0 20px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
	}
</style>
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
					<div class="card border-light" id="card-body">
						<img src="{{ asset($event->image_url) }}" alt="{{ $event->name }}" class="card-img-top" style="width: auto; height:172px;">
						<div class="card-body">
							<div class="row">
								<div class="col-7">
									<h5 class="text-truncate font-weight-bold text-capitalize" style="max-lines: 1; text-transform: capitalize;">
										{{\Carbon\Carbon::parse($event->start_date)->format('jS F Y')}}</h5>
								</div>
								{{-- <div class="col-5 text-right"> --}}
									<a href="{{ route('event', $event->id) }}" class="ml-auto mr-2 btn btn-sm btn-outline-dark stretched-link">Join Now</a>
								{{-- </div> --}}
							</div>
							<h3 class="card-title multi-line-truncate text-capitalize" style="max-lines: 2 text-transform: capitalize;">{{ $event->name }}</h3>
							<p class="card-text multi-line-truncate textcapitalize">{!! $event->description !!}</p>
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
					<div class="card border-light" id="card-body">
						<img src="{{ asset($event->image_url) }}" alt="{{ $event->name }}" class="card-img-top" style="width: auto; height:172px;">
						<div class="card-body">
							<div class="row">
								<div class="col-7">
									<h5 class="text-truncate font-weight-bold text-capitalize" style="max-lines: 1; text-transform: capitalize;">
										{{\Carbon\Carbon::parse($event->start_date)->format('jS F Y')}}</h5>
								</div>
								{{-- <div class="col-5 text-right"> --}}
									<a href="{{ route('event', $event->id) }}" class="ml-auto mr-2 btn btn-sm btn-outline-dark stretched-link">Join Now</a>
								{{-- </div> --}}
							</div>
							<h3 class="card-title multi-line-truncate text-capitalize" style="max-lines: 2 text-transform: capitalize;">{{ $event->name }}</h3>
							<p class="card-text multi-line-truncate text-capitalize">{!! $event->description !!}</p>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection