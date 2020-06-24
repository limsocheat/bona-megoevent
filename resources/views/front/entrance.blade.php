@extends('layouts.app')

@section ('title', "Entrance")

@section('content')

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


	@include('front.components.slider')

	<div class="mb-5">
		@include('front.components.entrance.subslider')
	</div>
	<div class="container">
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
						@foreach ($feature_events as $event)
							<div class="col-md-6 mb-4">
								<div class="card border-light" id="card-body">
									<img src="{{ asset($event->image_url) }}" alt="{{ $event->name }}" class="card-img-top" style="width: auto; height:172px;">
									<div class="card-body">
										<div class="row">
											<div class="col-7">
												<h5 class="text-truncate text-dark font-weight-bold"style=" max-lines: 1">
													{{\Carbon\Carbon::parse($event->created_at)->format('jS F Y')}}</h5>
											</div>
											{{-- <div class="col-5 text-right"> --}}
												<a href="#" class="ml-auto mr-2 btn btn-sm btn-outline-dark stretched-link">Join Now</a>
											{{-- </div> --}}
										</div>
										<h3 class="card-title multi-line-truncate" style="max-lines: 2">{{ $event->name }}</h3>
										<p class="card-text multi-line-truncate">{!! $event->description !!}</p>
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
@endsection