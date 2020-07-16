@extends('layouts.app')

@section ('title', $event->name)

@section('content')
<div class="container event-single-page">
	<div class="py-2 event-single-header">
		<div class="event-single-header-left">
			@if (count($event->banners))
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					@for ($i = 0; $i < count($event->banners); $i++)
						<div class="carousel-item <?php if($i == 0) {echo 'active';} ?>">
							<img class="d-block w-100" src="{{ url('/uploads/' . $event->banners[$i]["image"]) }}"
								alt="Third slide" class="figure-img img-fluid rounded"
								style="height: auto; max-height: 600px; width: auto; max-width: 900px; object-fit: cover;">
						</div>
						@endfor
						@if($event->floor_image)
						<div class="carousel-item">
							<img class="d-block w-100" src="{{ $event->floor_image }}" alt="Floor Image"
								class="figure-img img-fluid rounded"
								style="height: auto; max-height: 600px; width: auto; max-width: 900px">
						</div>
						@else

						@endif
				</div>
				<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			@else
			<img src="{{ $event->image_url }}" alt="{{ $event->name }}" class="img-fluid"
				style="height: auto; max-height: 600px; width: auto; max-width: 900px">
			@endif
		</div>
		<div class="event-single-header-right" style="background-color:#f1f1f1;">
			@include('front.components.event.headline')
		</div>
	</div>

	<div class="row py-2">
		<div class="col-md-12">
			<h1 class="text-left pl-0 mb-3 font-weight-bold" id="h1">Event Exhibitors</h1>
		</div>
		@include('front.components.exhibitor.carousel', [
		'exhibitors' => $event->exhibitors
		])
	</div>
	<div class="row py-2">
		<div class="col-md-12 py-2 ">
			<h1 class="text-left pl-0 mb-3 font-weight-bold" id="h1">Event</h1>
			<h4 class="font-weight-bold">{{ $event->name}}</h4>
		</div>

		<div class="col-md-6">
			<div class="py-2">
				<h5 class="font-weight-bold">Venue:</h5>
				<div><i class="fa fa-map-marker" style="font-size: 20px;color:black;" aria-hidden="true"></i>
					<span class="ml-4">{{$event->location ? $event->location->name : "To Be Announced"}}</span>
					<span class="ml-2">{{$event->location ? $event->location->address : null}}</span></div>
			</div>
			<div class="py-2">
				<h5 class="font-weight-bold">Date:</h5>
				<div><i class="fa fa-calendar-o" style="font-size: 20px;color: color:black;" aria-hidden="true"></i>
					<span class="ml-3 mr-2">Starting-Ending</span>{{ $event->display_start_date }} -
					{{ $event->display_end_date }}
				</div>
			</div>
			<div class="py-2">
				<h5 class="font-weight-bold">Time:</h5>
				<div><i class="fa fa-clock-o" style="font-size: 25px;color:black;" aria-hidden="true"></i>
					<span class="ml-3">{{ $event->display_start_time }} - {{ $event->display_end_time }}</span></div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="py-2">
				<h5 class="font-weight-bold">Event Type:</h5>
				<p class="mb-1">{{$event->type ? $event->type->name :null}}</p>
			</div>
			<div class="py-1">
				<h5 class="font-weight-bold">Event Category:</h5>
				<p class="mb-2">{{$event->category ? $event->category->name :null}}</p>
			</div>
			<div class="py-1">
				<h5 class="font-weight-bold">Organiser:</h5>
				<p class="mb-2">{{$event->organizer ? $event->organizer->name :null}}</p>
			</div>
		</div>

	</div>

	<div class="row py-2" id="event-description">
		<div class="col-md-6 py-4">
			<div class="py-3">
				<h5 class="font-weight-bold">Event Description:</h5>
				<p>{{$event->description}}</p>
			</div>
		</div>
		<div class="col-md-6 py-4">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="fee-tab" data-toggle="tab" href="#fee" role="tab" aria-controls="fee"
						aria-selected="true">Event Fee</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="exhibitor-tab" data-toggle="tab" href="#exhibitor" role="tab"
						aria-controls="exhibitor" aria-selected="false">Exhibitor Registration</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="fee" role="tabpanel" aria-labelledby="fee-tab">
					{!! Form::open(['route' => ['cart', $event->name], 'method' => "GET"]) !!}

					<div class="card">
						<div class="card-text">
							<table class="table table-event-pricing">
								<tr>
									<td>
										Regular Price
									</td>
									<td>
										${{ number_format($event->price, 2)}}/person
									</td>
								</tr>
								@if ($event->early_bird_price < $event->price)
									<tr>
										<td>
											Early Bird Price
											<br>
											<small class="text-danger">(When purchased before 12:00am
												{{ $event->display_early_bird_date }})</small>
										</td>
										<td>
											${{ number_format($event->early_bird_price, 2)}}/person
										</td>
									</tr>
									@endif
									@if ($event->group_price < $event->price)
										<tr>
											<td>
												Group Price
												<br>
												<small class="text-danger">(When purchased greater or equal to
													{{ $event->group_min_pax }}-person)</small>
											</td>
											<td>
												${{ number_format($event->group_price, 2)}}/person
											</td>
										</tr>
										@endif
										<tr>
											<td>
												Quantity <br>
												<small class="text-danger">(pax: {{ $event->pax_min }} =>
													{{ $event->pax_max }})</small>
											</td>
											<td>
												@php
												$qualities = [];
												for ($i=1; $i <= $event->pax_max; $i++) {
													$qualities[$i] = $i;
													}
													@endphp
													{!! Form::select('quantity', $qualities, null, ['class' =>
													'form-control']) !!}
											</td>
										</tr>
							</table>
						</div>
						<div class="card-footer text-center">
							@guest
							<a href="{{ route('login') }}" class="btn mego-gold-bg " style="width: 100%">Login To
								Purchase</a>
							@else
							<button type="submit" class="btn mego-gold-bg" style="width: 100%">Buy Ticket</button>
							@endguest
						</div>
					</div>
					{!! Form::close() !!}
				</div>
				<div class="tab-pane fade" id="exhibitor" role="tabpanel" aria-labelledby="exhibitor-tab">
					{!! Form::open(['route' => ['event.exhibitor_registration', $event->name], 'method' => "GET"]) !!}

					<div class="card">
						<div class="card-text">
							@if (Auth::user() && $event->exhibitors->contains(Auth::user()->id))
							<div class="alert alert-info m-3" role="alert">
								You already requested or you are already an exhibitor!
							</div>
							@else
							<div class="alert alert-info m-3" role="alert">
								If you're interested in joining the event as Exhibitor, please click the button below to
								join.
							</div>
							@endif
						</div>
						<div class="card-footer text-center">
							@guest
							<a href="{{ route('login') }}" class="btn btn-block font-weight-bold mego-gold-bg"
								style="width: 100%">Login To Register</a>
							@else
							@if (Auth::user() && $event->exhibitors->contains(Auth::user()->id))
							<a href="{{ route('manage.profile.index') }}" class="btn btn-outline-primary btn-block">View
								Request List</a>
							@else
							<button type="submit" class="btn btn-block font-weight-bold mego-gold-bg"
								style="width: 100%">Register</button>
							@endif
							@endguest
						</div>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

	<div class="row py-2 mt-4 mb-4">
		<div class="col-md-12">
			<h1 class="text-left pl-0 mb-3 font-weight-bold" id="h1">Upcoming Events</h1>
		</div>
		@foreach ($feature_events as $event)
		<div class="col-md-3 mb-4">
			@include('front.components.event.card')
		</div>
		@endforeach
	</div>
</div>
@endsection