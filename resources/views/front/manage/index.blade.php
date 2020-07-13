@extends('front.manage.layout.index')

@section('title', 'Manage')

@section('content_profile')
		<div class="col-md-10">
			@php
				$user = auth()->user();
			@endphp
			<div class="row">
				<div class="col-md-3 mb-2">
					<img src="{{ $user->profile ? $user->profile->avatar_url : asset('images/avatar.jpg') }}" alt="{{ $user->name }}" class="img-thumbnail">
				</div>
				<div class="col-md-9">
					<h3 class="user-company">{{ $user->company ? $user->company->name: 'N/A' }}</h3>
					<p class="user-name">{{ $user->name }}</p>
					<p>{{ $user->profile && $user->profile->country ? $user->profile->country->name  : 'N/A' }} | {{ $user->profile ? $user->profile->phone : 'N/A' }} | {{ $user->email }}</p>
				</div>
				<div class="col-md-12 mt-5">
					<h3 id="h1"><strong> Upcoming Events</strong></h3>
					@inject('event', 'App\Models\Event')
					@php
						$upcoming_events = $event::select('*')->whereDate('start_date', '>', date('Y-m-d'))->limit(3)->get();
					@endphp
					<div class="row">
						@foreach ($upcoming_events as $event)
							<div class="col-md-4">
								@include('front.components.event.card')
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection