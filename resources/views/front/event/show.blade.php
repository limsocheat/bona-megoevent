@extends('layouts.app')

@section ('title', $event->name)

@section('content')
<script src="{{ asset('/plugins/countdown/jquery.countdown.js') }}" type="text/javascript" charset="utf-8"></script>
<style type="text/css">
	br {
		clear: both;
	}

	.cntSeparator {
		font-size: 54px;
		margin: 10px 7px;
		color: #000;
	}

	.desc {
		margin: 7px 3px;
	}

	.desc div {
		float: left;
		font-family: Arial;
		width: 70px;
		margin-right: 65px;
		font-size: 13px;
		font-weight: bold;
		color: #000;
	}
</style>
<style type="text/css">
	#NextUpcomingEvent {
		width: auto;
		height: 250px;
	}

	#NextUpcomingEvent #ViewMore {
		color: red;
		text-align: right;
		margin-top: 10%;
		margin-right: 10px;
		font-size: 20px;
	}

	.multi-line-truncate {
		display: -webkit-box;
		-webkit-box-orient: vertical;
		-webkit-line-clamp: 2;
		overflow: hidden;
	}

	#card-body {
		height: 386.65px;
	}

	.btn-danger {
		color: #fff;
		width: 300px;
		background-color: #cc0000;
		border-radius: 35px;
		border: 1px solid rgba(220, 53, 69, 0.75);
	}

	.table-event-pricing td {
		font-size: 18px;
	}
</style>

<div class="container">

	@if (count($event->banners))
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
		<div class="text-block"
			style="position: absolute; bottom: 120px; right: 20px; background-color: black; color: white; padding-left: 20px; padding-right: 20px; padding-top: 30px;">
			<h4 id="demo">countdown</h4>
			<p>Event Starts In</p>
		</div>
	</div>
	@else
	<div style="position: relative;">
		<img src="{{ $event->image_url }}" alt="{{ $event->name }}" class="figure-img img-fluid rounded"
			style="width:100%; height: 450px; ">
		<div class="text-block"
			style="position: absolute; bottom: 120px; right: 20px; background-color: black; color: white; padding-left: 20px; padding-right: 20px; padding-top: 30px;">
			<h4 id="demo">countdown</h4>
			<p>Event Starts In</p>
		</div>
	</div>

	@endif

	<div class="row py-4">
		<div class="col-md-12">
			<h1 class="text-left pl-0 mt-5 mb-3 font-weight-bold">Event Exhibitors</h1>
		</div>
		@include('front.components.entrance.eventexhibitors')
	</div>
	<div class="row py-4">
		<div class="col-md-12 py-4 ">
			<h1 class="text-left pl-0 mt-5 mb-3 font-weight-bold">Event</h1>
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
		<div class="row py-4">
			<div class="col-md-6 p-4">
				<div class="py-3">
					<h5 class="font-weight-bold">Event Description:</h5>
					<p>{{$event->description}}</p>
				</div>
			</div>
			<div class="col-md-6 p-4">
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
										<small class="text-danger">(when purchased before 12:00am
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
											<small class="text-danger">(when purchased greater or equal to
												{{ $event->group_min_pax }}-person)</small>
										</td>
										<td>
											${{ number_format($event->group_price, 2)}}/person
										</td>
									</tr>
									@endif
									<tr>
										<td>
											Quality <br>
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
												{!! Form::select('quality', $qualities, null, ['class' =>
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
		</div>



	</div>

	<div class="col-md-12 px-0">
		<div class="row">
			<div class="col-md-8">
				<div class="row my-2">
					<div class="col-md-12">
						<h1 class="text-left pl-0 mt-5 mb-3 font-weight-bold">Highlighted Events</h1>
					</div>
					@foreach ($feature_events as $feature_event)
					<div class="col-md-6 mb-4">
						<div class="card border-light" id="card-body">
							<img src="{{ asset($feature_event->image_url) }}" alt="{{ $feature_event->name }}"
								class="card-img-top">
							<div class="card-body">
								<div class="row">
									<div class="col-7">
										<h5 class="text-truncate text-dark font-weight-bold" style=" max-lines: 1">
											{{\Carbon\Carbon::parse($feature_event->start_date)->format('jS F Y')}}</h5>
									</div>
									<div class="col-5 text-right">
										<a href="{{ route('event', $feature_event->id) }}"
											class="btn btn-sm btn-outline-dark">Join Now</a>
									</div>
								</div>
								<h3 class="card-title multi-line-truncate" style="max-lines: 2">
									{{ $feature_event->name }}</h3>
								<p class="card-text multi-line-truncate">{!! $feature_event->description !!}</p>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="col-md-4">

				<h1 class="text-left pl-0 mt-5 mb-3 font-weight-bold">&nbsp;</h1>

				<div id="NextUpcomingEvent" class="card">
					<h3 style="margin-top: 100px; text-align: center">Next Upcoming Event</h3>
					<a href="#" id="ViewMore">View more</a>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	jQuery(document).ready(function($){
		// $('#counter').countdown({
        //   image: "<?php echo asset('/plugins/countdown/img/digits.png'); ?>",
        //   startTime: '01:12:12:00'
        // });

		// Set the date we're counting down to
		// var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();
		var countDownDate = new Date("<?php echo $event->start_date; ?> <?php echo $event->start_time; ?>").getTime();

		// Update the count down every 1 second
		var x = setInterval(function() {

		// Get today's date and time
		var now = new Date().getTime();
			
		// Find the distance between now and the count down date
		var distance = countDownDate - now;
			
		// Time calculations for days, hours, minutes and seconds
		var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = Math.floor((distance % (1000 * 60)) / 1000);
			
		// Output the result in an element with id="demo"
		document.getElementById("demo").innerHTML = days + "d " + hours + "h "
		+ minutes + "m " + seconds + "s ";
			
		// If the count down is over, write some text 
		if (distance < 0) {
			clearInterval(x);
			document.getElementById("demo").innerHTML = "EXPIRED";
		}
		}, 1000);
	});
</script>
@endsection