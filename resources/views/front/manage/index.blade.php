@extends('layouts.app')

@section('title', 'Manage')

@section('content')
<div id="account-dashboard">

    <div class="container py-4">
        <div class="row">
            <div class="col-md-12 text-right mb-3">
                <small><a href="#"><small>MegoCoins</small></a> | <a href="#"><small>My Account</small></a> | <a href="#"><small>Contact Us</small></a></small>
            </div>
            <div class="col-md-6">
                <p style="font-size: 120%">
                    Hello <strong>{{ auth()->user()->name }} <br></strong>
                    How are you today?
                </p>   
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('manage.event.index') }}" class="btn btn-danger px-5" style="background-color: #cc0000; border: 1px solid #000;">MY EVENTS</a>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header py-0 px-0">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light nav-fill w-100">
                            <ul id="account-navbar" class="navbar navbar-nav nav-fill w-100">
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('manage.index') }}">{{ auth()->user()->name }}'s Board! <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('upcoming') }}">Visit an Event!</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-item nav-link" href="{{ route('upcoming') }}">Exhibit in and Event!</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-item nav-link" href="{{ route('manage.event.create') }}">Organise an Event!</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-item nav-link" href="{{ route('index') }}">Megoshopping!</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
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
                                    <div class="col-md-3">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection