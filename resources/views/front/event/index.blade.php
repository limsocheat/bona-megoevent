
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
				<h1 class="text-left pl-0 mt-5 mb-3 font-weight-bold" id="h1">Category 1</h1>
			</div>
			@foreach ($events as $event)
				<div class="col-md-3 mb-4">
					@include('front.components.event.card')
				</div>
			@endforeach
		</div>
		<div class="row my-4">
			<div class="col-md-12">
				<h1 class="text-left pl-0 mt-5 mb-3 font-weight-bold" id="h1">Category 2</h1>
			</div>
			@foreach ($events as $event)
				<div class="col-md-3 mb-4">
					@include('front.components.event.card')
				</div>
			@endforeach
		</div>
	</div>
@endsection