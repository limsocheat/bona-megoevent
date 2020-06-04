@extends('layouts.app')

@section('content')
    <div class="container grid">
        <div class="row">
			@include('front.components.slider')
		</div>
		<div class="row my-4">
			@include('front.components.statistic')
		</div>
		<div class="row my-4">
			@include('front.components.exhibitors')
		</div>
		<div class="row my-4">
			@include('front.components.filter')
		</div>
	</div>
@endsection