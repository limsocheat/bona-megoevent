<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

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
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
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
                <div class="col-md-12">
                    <div class="float-left" style="padding-top:13px">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('images/logo.png') }}" class="logo"/>
                        </a>
                    </div>
                    <nav class="navbar navbar-expand-md navbar-default navbar-fixed-top navbar-white bg-white pt-0 pb-0 pr-0">
                        <div class="container pr-0">
                            <div class=" navbar-collapse d-flex justify-content-end">
                                <ul class="navbar-nav navbar-right ml-auto">
                                    <div class="row ">

                                        <div class="col-xs-3">
                                            <li class="nav-item actives" data-toggle="tooltip" data-placement="bottom"
                                                title="Search">
                                                <a href="{{ route('search') }}" class="nav-link">
                                                    <i class="fa fa-search" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </div>
                                        <div class="col-xs-3">
                                            <li class="nav-item" data-toggle="tooltip" data-placement="bottom"
                                                title="Email">
                                                <a href="{{ route('contact') }}" class="nav-link">
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
                                       
                                        <li class="nav-item dropdown ">
                                            <a href="{{ route('manage.profile.index') }}"
                                                class="nav-link dropdown-toggle" data-toggle="dropdown">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                            </a>
                                            <ul class="dropdown-content p-0 mr-auto ml-auto">
                                                <li>
                                                    <a href="{{ route('manage.profile.index') }}">Profile</a>
                                                    </a>
                                                <li>
                                                    <a href="{{ route('manage.purchase.index')}}">Purchase</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('manage.event.index')}}">Event</a>
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
    <nav class="navbar navbar-expand-md navbar-default fixed-top sticky-top navbar-white bg-white pt-0 pb-0"
        style="border-bottom: 1px solid #efefef; border-top: 1px solid #efefef;">
        <div class="container">
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
                        <a href="{{ route('index') }}" class="nav-link nav-link-left">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('upcoming') }}" class="nav-link">Upcoming Events</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="{{ route('entrance') }}" class="nav-link">Entrance</a>
                    </li> --}}
                </ul>
                <ul id="navbar-nav" class="navbar-nav navbar-right ml-auto">
                    <li class="nav-item">
                        <a href="" data-toggle="modal" data-target="#about" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('contact')}}" class="nav-link nav-link-right">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    

    @inject('page', 'App\Models\Page')
    @php
    $contact = $page::select('*')->where('slug', 'contact')->first();
    $about = $page::select('*')->where('slug', 'about')->first();
    @endphp
    <div class="modal fade" id="about" tabindex="-1"  role="dialog" aria-labelledby="aboutLabel" aria-hidden="true">
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
    @if(!Request::is('/'))
        <nav class="bg-white shadow-sm pt-0 pb-0" aria-label="breadcrumb">
            <div class="container">
                <ul class="breadcrumb"
                    style="margin-bottom: 0; padding-left: 0; padding-top: 3px; padding-bottom: 3px; background-color: transparent;">
                    <li class="breadcrumb-item text-capitalize{{ $breadcrumbs->isEmpty() ? 'active' : '' }}" ><a href="{{ route('index') }}"
                            style="padding: 0" >Home</a></li>
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