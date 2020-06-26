@extends('layouts.app')

@section ('title', $event->name)

@section('content')
<div class="container event-single-page">

	@if (count($event->banners))
		<div class="row py-2">
			<div class="col-md-8" >
				<div style="position: relative;">
					<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							@for ($i = 0; $i < count($event->banners); $i++)
								<div class="carousel-item <?php if($i == 0) {echo 'active';} ?>">
									<img class="d-block w-100" src="{{ url('/upload/' . $event->banners[$i]["image"]) }}"
										alt="Third slide" class="figure-img img-fluid rounded" style="width:100%; height: 450px; ">
								</div>
							@endfor
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
				</div>
			</div>
			<div class="col-md-4 " style="background-color:#f1f1f1;height: 450px; margin-left:-15px">
				<div>
					<div>
						<span class="font-weight-bold">{{ $event->display_start_date }}</span>
						<h5  class="font-weight-bold mt-3">{{ $event->name}}</h5>
					</div>
					<div>
						<div c class="ml-5" style="padding-top:50px;">
							<h4 id="demo">Countdown</h4>
							<p>Event Starts In</p>
						</div>
						<div style="text-align: center;">
							<p><a href="{{ route('cart', $event->id) }}?quantity=1" class="btn btn-outline-danger ml-2">Join as Exhibitor</a>
								<span><a href="{{ route('cart', $event->id) }}?quantity=1" class="btn btn-outline-danger ml-2">Join as Participants</a></span></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	@else
	<div class="row py-2">
			<div class="col-md-8" >
				<div style="position: relative;">
					<img src="{{ $event->image_url }}" alt="{{ $event->name }}" class="figure-img img-fluid rounded"
						style="width:100%; height: 450px; ">
					
				</div>
			</div>
			<div class="col-md-4 " style="background-color:#f1f1f1;height: 450px; margin-left:-15px">
				@include('front.components.event.headline')
			</div>
	</div>

	@endif

	<div class="row py-2">
		<div class="col-md-12">
			<h1 class="text-left pl-0 mb-3 font-weight-bold" id="h1">Event Exhibitors</h1>
		</div>
		@include('front.components.entrance.eventexhibitors')
	</div>
	<div class="row py-2">
		<div class="col-md-12 py-2 ">
			<h1 class="text-left pl-0 mb-3 font-weight-bold" id="h1">Event</h1>
			<h4 class="font-weight-bold">{{ $event->name}}</h4>
		</div>
		<div class="col-md-6">

			<div class="py-3">
				<h5 class="font-weight-bold">Venue:</h5>
				<div><i class="fa fa-map-marker" style="font-size: 25px;color:black;" aria-hidden="true"></i>
					<span class="ml-4">{{$event->location ? $event->location->name : "To Be Announced"}}</span>
					<span class="ml-2">{{$event->location ? $event->location->address : null}}</span></div>
			</div>
			<div class="py-2">
				<h5 class="font-weight-bold">Date:</h5>
				<div><i class="fa fa-calendar-o" style="font-size: 25px;color: color:black;" aria-hidden="true"></i>
					<span class="ml-3 mr-2">Starting-Ending</span>{{ $event->display_start_date }} -
					{{ $event->display_end_date }}
				</div>
			</div>
			<div class="py-3">
				<h5 class="font-weight-bold">Time:</h5>
				<div><i class="fa fa-clock-o" style="font-size: 30px;color:black;" aria-hidden="true"></i>
					<span class="ml-3">{{ $event->display_start_time }} - {{ $event->display_end_time }}</span></div>
			</div>

		</div>
		<div class="col-md-6">

			<div class="py-3">
				<h5 class="font-weight-bold">Event Type:</h5>
				<p>{{$event->type ? $event->type->name :null}}</p>
			</div>
			<div class="py-3">
				<h5 class="font-weight-bold">Event Category:</h5>
				<p>{{$event->category ? $event->category->name :null}}</p>
			</div>
			<div class="py-3">
				<h5 class="font-weight-bold">Organiser:</h5>
				<p>{{$event->organizer ? $event->organizer->name :null}}</p>
			</div>
		</div>
	</div>

	<div class="row py-2">
		<div class="col-md-6 py-4">
			<div class="py-3">
				<h5 class="font-weight-bold">Event Description:</h5>
				<p>{{$event->description}}</p>
			</div>
		</div>
		<div class="col-md-6 py-4">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="fee-tab" data-toggle="tab" href="#fee" role="tab" aria-controls="fee" aria-selected="true">Event Fee</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="exhibitor-tab" data-toggle="tab" href="#exhibitor" role="tab" aria-controls="exhibitor" aria-selected="false">Exhibitor Registration</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="fee" role="tabpanel" aria-labelledby="fee-tab">
					{!! Form::open(['route' => ['cart', $event->id], 'method' => "GET"]) !!}
						@guest
						<div class="alert alert-danger" role="alert">
							You must login or register first!
						</div>
						@endguest

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
								<a href="{{ route('login') }}" class="btn btn-block font-weight-bold btn-danger"
									style="width: 100%">Login
									To Purchase</a>
								@else
								<button type="submit" class="btn btn-block font-weight-bold btn-danger" style="width: 100%">Buy
									Ticket</button>
								@endguest
							</div>
						</div>
					{!! Form::close() !!}
				</div>
				<div class="tab-pane fade" id="exhibitor" role="tabpanel" aria-labelledby="exhibitor-tab">
					{!! Form::open(['route' => ['event.exhibitor_registration', $event->id], 'method' => "GET"]) !!}
						@guest
						<div class="alert alert-danger" role="alert">
							You must login or register first!
						</div>
						@endguest

						<div class="card">
							<div class="card-text">
								 @if (Auth::user() && $event->exhibitors->contains(Auth::user()->id))
									<div class="alert alert-info m-3" role="alert">
										You already requested or you are already an exhibitor!
									</div>
								@else 
									<div class="alert alert-info m-3" role="alert">
										If you're interested in joining the event as Exhibitor, please click the button below to join.
									</div>
								@endif
							</div>
							<div class="card-footer text-center">
								@guest
									<a href="{{ route('login') }}" class="btn btn-block font-weight-bold btn-danger"
									style="width: 100%">Login To Register</a>
								@else
									@if (Auth::user() && $event->exhibitors->contains(Auth::user()->id))
										<a href="{{ route('manage.profile.index') }}" class="btn btn-outline-primary btn-block">View Request List</a>
									@else 
										<button type="submit" class="btn btn-block font-weight-bold btn-danger" style="width: 100%">Register</button>
									@endif
								@endguest
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

	<div class="row py-2">
		<div class="col-md-8">
			<div class="row my-2">
				<div class="col-md-12">
					<h1 class="text-left pl-0 mt-5 mb-3 font-weight-bold" id="h1">Highlighted Events</h1>
				</div>
				@foreach ($feature_events as $event)
				<div class="col-md-6 mb-4">
					@include('front.components.event.card')
				</div>
				@endforeach
			</div>
		</div>
		<div class="col-md-4">

			<h1 class="text-left pl-0 mt-5 mb-3 font-weight-bold">&nbsp;</h1>

			<div id="NextUpcomingEvent" class="card">
				<h3 style="margin-top: 100px; text-align: center">Next Upcoming Event</h3>
				<a href="#" id="ViewMore">View More</a>
			</div>
		</div>
	</div>
</div>
@endsection