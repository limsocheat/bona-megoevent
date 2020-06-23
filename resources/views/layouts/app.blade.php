<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/slick-lightbox/0.2.12/slick-lightbox.min.js"></script>
    <script type="text/javascript" src="{{ asset('plugins/nice-select/js/jquery.nice-select.js') }}"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


    <link type="text/css" rel="stylesheet" href="{{ asset('/plugins/image-uploader/image-uploader.css') }}">
    <script type="text/javascript" src="{{ asset('/plugins/image-uploader/image-uploader.js') }}"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!---icon--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/circle.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-lightbox/0.2.12/slick-lightbox.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

    <link rel="stylesheet" href="{{ asset('plugins/nice-select/css/nice-select.css') }}">

    <style type="text/css">
        @font-face {
            font-family: "Century Gothic";
            src: url("{{ asset('/fonts/gothic.ttf') }}") format('truetype');
            /* src: url("<?php echo asset('fonts/GOTHIC.TTF'); ?>"); */
        }

        * {
            font-family: 'Century Gothic'
        }

        .navbar {
            overflow: hidden;
            background-color: #333;
        }

        #navbar-nav .active {
            border-bottom: 4px solid black;
        }

        .navbar-nav .actives {
            border-bottom: 4px solid white;

        }

        .accent-cyannavbar-nav ul li:hover {
            border-bottom: 4px solid black;
        }

        .actives a i {
            font-size: 20px;
        }

        .navbar-nav li {
            border-left: 1px solid #efefef;
        }

        .navbar-nav li a {
            text-decoration: none;
            font-weight: 700;
            font-size: 1.2em;
            color: #000000;
            text-transform: capitalize;
            position: relative;
            text-align: center;
            padding: 18px 15px;
        }

        .navbar-nav li a::before {
            content: "";
            position: absolute;
            top: 100%;
            left: 0;
            width: 0;
            height: 4px;
            background-color: black;
            /* transition: all .1s linear; */
        }

        .navbar-nav li a:hover {
            transition: .05s;
        }

        .navbar-nav li a:hover::before {
            width: 100%;
            background-color: black;
        }

        /* .dropdown-menu {
            z-index: 1;
        } */

        .container {
            max-width: 1280px !important;
        }


        body p,
        a,
        label {
            font-size: 16px;
        }

        body a,
        body a:hover {
            color: #000;
        }

        /* dropdown */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* .navbar-nav .dropdown-content {
            y
        } */

        .dropdown-content {
            display: none;
            position: fixed;
            float: left;
            background-color: #f1f1f1;
            min-width: 170px;
            min-height: 210px;
            right: 60px;
            border-bottom: none;
            z-index: 1;
        }

        .dropdown .dropdown-content li {
            padding: 10px 16px;
            text-decoration: none;
            display: block;
            text-align: center;
            font-size: 14px;
            left: 1px;
        }

        /* .dropdown-content li {} */

        .dropdown:hover .dropdown-content {
            display: block;

        }

        @media (max-width: 576px) {
            .dropdown-content {
                display: none;
                position: fixed;
                background-color: #f1f1f1;
                min-width: 200px;
                min-height: 210px;
                right: 4px;
                z-index: 1;
            }
        }
        .nav-item a i.fa {
            padding-left: 15px;
            padding-right: 15px;
        }
    </style>
</head>

<body>
    <div id="app">
        @inject('banner', 'App\Models\Banner')
        @php
        $header_banner = $banner::select('*')->where('location', 'header')->first();
        @endphp
        <div class="bg-white">
            <div class="container">
                <div class="row">
                    {{-- <div class="col-md-4">
                        <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" style="width: 150px !important" />
                    </a>
                </div> --}}
                <div class="col-md-12">
                    {{-- <a class="navbar-brand" href="{{ $header_banner->link }}" style="width: 100%;">
                    <img src="{{ asset($header_banner->image) }}" style="width: 100%; height: auto;" />
                    </a> --}}
                    <div class="float-left">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('images/logo.png') }}" style="width: 100px !important" />
                        </a>
                    </div>
                    <nav class="navbar navbar-expand-md navbar-default navbar-fixed-top navbar-white bg-white pt-0 pb-0"
                        style="border-bottom: 1px solid #efefef; border-top: 1px solid #efefef;">
                        <div class="container">
                            {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                            </button> --}}
                            {{-- <button class="navbar-toggler navbar-toggler-right border-dark" type="button"
                                    data-toggle="collapse" data-target="#navbarSupportedContent"
                                    aria-controls="navbarSupportedContent" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"><i class="fa fa-bars"
                                            style="color:#1f1c1c; font-size:28px;"></i></span>
                                </button> --}}
                            <div class=" navbar-collapse d-flex justify-content-end">
                                <ul class="navbar-nav navbar-right ml-auto">
                                    <div class="row ">


                                        <div class="col-xs-3">
                                            <li class="nav-item actives" data-toggle="tooltip" data-placement="bottom"
                                                title="Search">
                                                <a href="" class="nav-link">
                                                    <i class="fa fa-search" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </div>
                                        <div class="col-xs-3">
                                            <li class="nav-item" data-toggle="tooltip" data-placement="bottom"
                                                title="Email">
                                                <a href="" class="nav-link">
                                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </div>
                                        @guest
                                        <li class="nav-item" data-toggle="tooltip" data-placement="bottom"
                                            title="Sign Up">
                                            <a href="{{ route('register') }}" class="nav-link">
                                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item" data-toggle="tooltip" data-placement="bottom"
                                            title="Sign in">
                                            <a href="{{ route('login') }}" class="nav-link">
                                                <i class="fa fa-sign-in" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        @else
                                        <li class="nav-item dropdown">
                                            <a href="{{ route('manage.profile.index') }}"
                                                class="nav-link dropdown-toggle" data-toggle="dropdown">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                            </a>
                                            {{-- dropdown --}}
                                            <ul class="dropdown-content p-0">
                                                <li>
                                                    <a href="{{ route('manage.profile.index') }}">Your Profile</a>
                                                    </a>
                                                <li>
                                                    <a href="{{ route('manage.purchase.index')}}">Manage
                                                        Purchase</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('manage.ticket.index')}}">Manage Ticket</a>

                                                </li>
                                                <li>
                                                    <a href="{{ route('manage.event.index')}}">Manage Event</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('manage.order.index')}}">Manage Order</a>

                                                </li>
                                                <li>
                                                    <a href="{{ route('manage.order_ticket.index')}}">Manage Order Ticket</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item" data-toggle="tooltip" data-placement="bottom"
                                            title="Sign Out">
                                            <a href="#"
                                                onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                                class="nav-link">
                                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                        @endguest
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-md navbar-default navbar-fixed-top navbar-white bg-white pt-0 pb-0"
        style="border-bottom: 1px solid #efefef; border-top: 1px solid #efefef;">
        <div class="container">
            {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
            </button> --}}
            <button class="navbar-toggler navbar-toggler-right border-dark" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fa fa-bars"
                        style="color:#1f1c1c; font-size:28px;"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul id="navbar-nav" class="navbar-nav mr-auto">
                    <li class="nav-item active" >
                        <a href="{{ route('index') }}" class="nav-link" style="padding-left: 0">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('upcoming') }}" class="nav-link">Upcoming Events</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('entrance') }}" class="nav-link">Entrance</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-toggle="modal" data-target="#about" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('contact')}}" class="nav-link">Contact</a>
                    </li>
                </ul>
                {{-- right side of navba --}}
                {{-- <ul class="navbar-nav navbar-right ml-auto">
                        <li class="nav-item actives" data-toggle="tooltip" data-placement="bottom" title="Search">
                            <a href="" class="nav-link">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Email">
                            <a href="" class="nav-link">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </a>
                        </li>
                        @guest
                        <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Sign Up">
                            <a href="{{ route('register') }}" class="nav-link">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
                </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Sign in">
                    <a href="{{ route('login') }}" class="nav-link">
                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                    </a>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a href="{{ route('manage.profile.index') }}" class="nav-link dropdown-toggle"
                        data-toggle="dropdown">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </a>

                    <ul class="dropdown-content p-0">
                        <li>
                            <a href="{{ route('manage.profile.index') }}">Your Profile</a>
                            </a>
                        <li>
                            <a href="{{ route('manage.purchase.index')}}">Manage Purchase</a>
                        </li>
                        <li>
                            <a href="{{route('manage.ticket.index')}}">Manage Ticket</a>

                        </li>
                        <li>
                            <a href="{{ route('manage.event.index')}}">Manage Event</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Sign Out">
                    <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                        class="nav-link">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                @endguest
                </ul> --}}

            </div>
        </div>

        @inject('page', 'App\Models\Page')
        @php
        $contact = $page::select('*')->where('slug', 'contact')->first();
        $about = $page::select('*')->where('slug', 'about')->first();
        @endphp
        <div class="modal fade" id="about" tabindex="-1" role="dialog" aria-labelledby="aboutLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="aboutLabel">
                            {!! $about->title !!}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @inject('page', 'App\Models\Page')
                        {!! $about->description !!}
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="contactLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!-- <div class="modal-header">
                            <h5 class="modal-title" id="contactLabel">{!! $contact->title !!}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {!! $contact->description !!}
                        </div> -->
                        <form class="mt-5 mb-5 text-capitalize " style="width:500px; margin:auto;">
                            <h1 class="text-center">Contact us</h1>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Name*</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Email*</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Contact Number</label>
                                <input type="text" class="form-control" id="formGroupExampleInput"
                                    placeholder="Contact Number">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Country</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2"
                                    placeholder="Country">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Company Name</label>
                                <input type="text" class="form-control" id="formGroupExampleInput"
                                    placeholder="Company Name">
                            </div>
                            <div class="form-group">
                                <label for="inputState">Type</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Enquiry </option>
                                    <option>Testimonial</option>
                                    <option>Feedback</option>
                                    <option>Advertiser</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Message</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="col-md-12">
                                {!! Captcha::display($attributes = [
                                'data-type' => 'audio',
                                ]) !!}
                                @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
        </span>
        @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
        </div>
        </div> --}}
    </nav>
    @if(!Request::is('/'))
        <nav class="bg-white shadow-sm pt-0 pb-0" aria-label="breadcrumb">
            <div class="container">
                <ul class="breadcrumb"
                    style="margin-bottom: 0; padding-left: 0; padding-top: 3px; padding-bottom: 3px; background-color: transparent;">
                    <li class="breadcrumb-item text-capitalize{{ $breadcrumbs->isEmpty() ? 'active' : '' }}"><a href="/"
                            style="padding: 0">Home</a></li>
                    @foreach ($breadcrumbs as $key => $url)
                    <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}"
                        aria-current="{{ $loop->last ? 'page' : '' }}">
                        <a href="{{ url($url) }}" style="padding: 0">
                            @if (! $loop->last)
                            {{ ucfirst($key) }}
                            @else
                            @yield ('title')
                            @endif
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </nav>
    @endif

    <main>
        @yield('content')
    </main>

    @include('layouts.footer')
    </div>
    @yield('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $(".nav-item").on("click", function(){
            $(".collapse").find(".active").removeClass("active");
            $(this).addClass("active");
            });
            $('[data-toggle="tooltip"]').tooltip();
           
        });
    </script>
</body>

</html>