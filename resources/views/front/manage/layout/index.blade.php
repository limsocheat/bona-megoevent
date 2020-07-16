@extends('layouts.app')

@section('title', 'Manage')

@section('content')
<div id="account-dashboard">
    <div class="container py-4">
        <div class="row">

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-2 mego-event-layout-image">
                        <img src="{{  asset('/images/create_event.png') }}" alt="" />
                    </div>
                    <div class="col-md-10">
                        <p>
                            Hello <strong>{{ auth()->user()->fullname }} <br></strong>
                            How are you today?
                        </p>
                    </div>
                </div>

            </div>
            <div class="col-md-6 text-right mb-3" id="mego-mego-text-small">
                <small><a href="#"><small>MegoCoins</small></a> | <a href="#"><small>My Account</small></a> | <a
                        href="#"><small>Contact Us</small></a></small>
                <div class="mt-3">
                    <a href="{{ route('manage.event.index') }}" class="btn mego-gold-bg px-5 mb-2">My Events</a>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header py-0 px-0">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light nav-fill w-100" id="account-submenu">
                            <ul id="account-navbar" class="navbar navbar-nav nav-fill w-100 pr-0">
                                <li class="nav-item">
                                    <a class="nav-link active text-capitalize"
                                        href="{{ route('manage.index') }}">{{ auth()->user()->fullname }}'s Board! <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item text-center">
                                    <a class="nav-link text-capitalize text-center" href="{{ route('upcoming') }}">Visit
                                        an Event!</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-item nav-link text-capitalize" href="{{ route('upcoming') }}">Exhibit
                                        in and Event!</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-item nav-link text-capitalize"
                                        href="{{ route('manage.event.create') }}">Organise an Event!</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-item nav-link text-capitalize"
                                        href="{{ route('index') }}">Megoshopping!</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 mb-3">
                                <nav id="account-nav" class="nav flex-column">
                                    <a class="nav-link active " href="{{ route('manage.index') }}">Info</a>
                                    <a class="nav-link " href="{{ route('product') }}">Products</a>
                                    <a class="nav-link " href="{{ route('manage.profile.index') }}">Activities</a>
                                    <a class="nav-link " href="{{ route('manage.profile.index') }}">Account Info</a>
                                    <a class="nav-link " href="{{ route('manage.profile.index') }}">History</a>
                                </nav>
                            </div>
                            @yield('content_profile')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection