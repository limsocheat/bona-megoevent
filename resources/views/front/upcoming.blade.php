
@extends('layouts.app')

@section('content')
<div class="container grid">

    <div class="row my-4">
			<div class="col-md-12">
				<h2 class="text-left">Filter Events</h2>
			</div>
			@include('front.components.filter')
		</div>
	</div>
@endsection