@extends('layouts.app')

@section('content')

	<div class="my-4">
			@include('front.components.entrance.breadcrumb')
		</div>
        <div class="">
		    @include('front.components.entrance.slideentrance')
		</div>
		<div class="mb-5">
			@include('front.components.entrance.subslider')
		</div>
		<div class="container">
        <div class="row py-4">
			<div class="col-md-12">
				<h2 class="text-left">Event Exhibitors</h2>
			</div>
			@include('front.components.entrance.eventexhibitors')
		</div>
        <div class="row my-4">
			<div class="col-md-12">
				<h2 class="text-left">Feared Exhibitors</h2>
			</div>
			@include('front.components.entrance.featureexhibitors')
		</div>
    </div>
@endsection