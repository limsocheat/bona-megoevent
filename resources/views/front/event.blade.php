@extends('layouts.app')

@section ('title', $event->name)

@section('content')
	<script src="{{ asset('/plugins/countdown/jquery.countdown.js') }}" type="text/javascript" charset="utf-8"></script>
	<style type="text/css">
      br { clear: both; }
      .cntSeparator {
        font-size: 54px;
        margin: 10px 7px;
        color: #000;
      }
      .desc { margin: 7px 3px; }
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
			color:red;
			text-align:right;
			margin-top:10%;
			margin-right:10px;
			font-size: 20px;
		}
		.multi-line-truncate {
			display: -webkit-box;
			-webkit-box-orient: vertical;
			-webkit-line-clamp: 2;
			overflow: hidden;
			}
			#card-body{
			height: 386.65px;
		}
	</style>

	<div class="container">

		@if (count($event->banners))
			<div style="position: relative;">
				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						@for ($i = 0; $i < count($event->banners); $i++)
							<div class="carousel-item <?php if($i == 0) {echo 'active';} ?>">
								<img class="d-block w-100" src="{{ url('/upload/' . $event->banners[$i]["image"]) }}" alt="Third slide" class="figure-img img-fluid rounded" style="width:100%; height: 450px; ">
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
				<div class="text-block" style="position: absolute; bottom: 120px; right: 20px; background-color: black; color: white; padding-left: 20px; padding-right: 20px; padding-top: 30px;">
					<h4 id="demo">countdown</h4>
					<p>until event happens</p>
				</div>
			</div>
		@else 
			<div style="position: relative;">
				<img src="{{ $event->image_url }}" alt="{{ $event->name }}" class="figure-img img-fluid rounded" style="width:100%; height: 450px; ">
				<div class="text-block" style="position: absolute; bottom: 120px; right: 20px; background-color: black; color: white; padding-left: 20px; padding-right: 20px; padding-top: 30px;">
					<h4 id="demo">countdown</h4>
					<p>until event happens</p>
				</div>
			</div>
			
		@endif

		<div class="row py-4">
			<div class="col-md-12">
				<h1 class="text-left pl-0 mt-5 mb-3 font-weight-bold">Event Exhibitors</h1>
			</div>
			@include('front.components.entrance.eventexhibitors')
		</div>
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-8">
					<div class="row my-2">
						<div class="col-md-12">
							<h1 class="text-left pl-0 mt-5 mb-3 font-weight-bold">Highlighted Events</h1>
						</div>
						@foreach ($feature_events as $feature_event)
							<div class="col-md-6 mb-4">
								<div class="card border-light" id="card-body">
									<img src="{{ asset($feature_event->image_url) }}" alt="{{ $feature_event->name }}" class="card-img-top">
									<div class="card-body">
										<div class="row">
											<div class="col-7">
												<h5 class="text-truncate text-dark font-weight-bold"style=" max-lines: 1">
													{{\Carbon\Carbon::parse($feature_event->start_date)->format('jS F Y')}}</h5>
											</div>
											<div class="col-5 text-right">
												<a href="{{ route('event', $feature_event->id) }}" class="btn btn-sm btn-outline-dark">Join Now</a>
											</div>
										</div>
										<h3 class="card-title multi-line-truncate" style="max-lines: 2">{{ $feature_event->name }}</h3>
										<p class="card-text multi-line-truncate">{!! $feature_event->description !!}</p>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
				<div class="col-md-4">

					<h1 class="text-left pl-0 mt-5 mb-3 font-weight-bold">&nbsp;</h1>
							
					<div class="card" style="height:300px;">
						<form class="text-center border border-light p-4" action="#!">
							<p class="h4 mb-4">Sign in</p>
							<input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="EMAI ADDRESS">
							<input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="PASSWORD">
							<div class="d-flex justify-content-around">
							</div>
							<button class="btn btn-info btn-block my-4" type="submit">SIGN UP FREE</button>
						</form>
					</div>

					<p>&nbsp;</p>

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