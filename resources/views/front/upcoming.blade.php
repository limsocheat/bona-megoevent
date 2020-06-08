
@extends('layouts.app')

@section('content')
	<div class="my-4">
		@include('front.components.entrance.breadcrumb')
	</div>
	<div class="container">
		
		<div class="row my-4">
			@include('front.components.upcoming.banner')
		</div>
		<div class="row my-4">
			@include('front.components.filter')
		</div>
		<div class="row my-4">
			@include('front.components.upcoming.gategory')
		</div>
	</div>
@endsection