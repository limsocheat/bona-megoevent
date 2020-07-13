@extends('front.manage.layout.index')

@section('title', 'Manage')

<<<<<<< HEAD
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
=======
@section('content')
<div id="account-dashboard">
    <style>
        #text-small small {
            font-size: 16px;
        }

        #text-small a:hover {
            color: #bf9000;
        }
    </style>
    <div class="container py-4">
        <div class="row">
            <div class="col-md-12 text-right mb-3" id="text-small">
                <small><a href="#"><small>MegoCoins</small></a> | <a href="#"><small>My Account</small></a> | <a
                        href="#"><small>Contact Us</small></a></small>
            </div>
            <div class="col-md-6">
                <p style="font-size: 120%">
                    Hello <strong>{{ auth()->user()->name }} <br></strong>
                    How are you today?
                </p>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('manage.event.index') }}" class="btn mego-gold-bg px-5 mb-2">My Events</a>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header py-0 px-0">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light nav-fill w-100" id="account-submenu">
                            <ul id="account-navbar" class="navbar navbar-nav nav-fill w-100 pr-0">
                                <li class="nav-item">
                                    <a class="nav-link active text-capitalize" id="account-link"
                                        href="{{ route('manage.index') }}">{{ auth()->user()->name }}'s Board! <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-capitalize" id="account-link"
                                        href="{{ route('upcoming') }}">Visit an Event!</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-item nav-link text-capitalize" id="account-link"
                                        href="{{ route('upcoming') }}">Exhibit in and Event!</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-item nav-link text-capitalize" id="account-link"
                                        href="{{ route('manage.event.create') }}">Organise an Event!</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-item nav-link text-capitalize" id="account-link"
                                        href="{{ route('index') }}">Megoshopping!</a>
                                </li>
                            </ul>
                        </nav>
                        {{-- <nav class="navbar navbar-light bg-faded">
                            <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2"
                                aria-controls="exCollapsingNavbar2" aria-expanded="false" aria-label="Toggle navigation">
                                &#9776;
                            </button>
                            <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
                                <a class="navbar-brand" href="#">Responsive navbar</a>
                                <ul class="nav navbar-nav">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Features</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Pricing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">About</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        
                        <nav class="navbar navbar-light bg-faded">
                            <a class="navbar-brand" href="#">Responsive navbar</a>
                            <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#CollapsingNavbar"
                                aria-controls="exCollapsingNavbar2" aria-expanded="false" aria-label="Toggle navigation">
                                &#9776;
                            </button>
                            <div class="collapse navbar-toggleable-xs" id="CollapsingNavbar">
                                <ul class="nav navbar-nav pull-sm-right">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Features</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Pricing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">About</a>
                                    </li>
                                </ul>
                            </div>
                        </nav> --}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 mb-3">
                                <nav id="account-nav" class="nav flex-column">
                                    <a class="nav-link active" href="{{ route('manage.index') }}">Info</a>
                                    <a class="nav-link" href="{{ route('product') }}">Products</a>
                                    <a class="nav-link" href="{{ route('manage.profile.index') }}">Activities</a>
                                    <a class="nav-link" href="{{ route('manage.profile.index') }}">Account Info</a>
                                    <a class="nav-link" href="{{ route('manage.profile.index') }}">History</a>
                                </nav>
                            </div>
                            <div class="col-md-10">
                                @php
                                $user = auth()->user();
                                @endphp
                                <div class="row">
                                    <div class="col-md-3 mb-2">
                                        <img src="{{ $user->profile ? $user->profile->avatar_url : asset('images/avatar.jpg') }}"
                                            alt="{{ $user->name }}" class="img-thumbnail">
                                    </div>
                                    <div class="col-md-9">
                                        <h3 class="user-company">{{ $user->company ? $user->company->name: 'N/A' }}</h3>
                                        <p class="user-name">{{ $user->name }}</p>
                                        <p>{{ $user->profile && $user->profile->country ? $user->profile->country->name  : 'N/A' }}
                                            | {{ $user->profile ? $user->profile->phone : 'N/A' }} | {{ $user->email }}
                                        </p>
                                    </div>
                                    <div class="col-md-12 mt-5">
                                        <h3 id="h1"><strong> Upcoming Events</strong></h3>
                                        @inject('event', 'App\Models\Event')
                                        @php
                                        $upcoming_events = $event::select('*')->published()->whereDate('start_date',
                                        '>', date('Y-m-d'))->limit(3)->get();
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
>>>>>>> f5978f002ed7b14369c79c0a5cf19f6f1128fbe1
@endsection