<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="{{ asset('plugins/nice-select/js/jquery.nice-select.js') }}"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!---icon--->
    <link rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/circle.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

    <link rel="stylesheet" href="{{ asset('plugins/nice-select/css/nice-select.css') }}">

    <style type="text/css">
        @font-face {
            font-family: CenturyGothic;
            src: {{ asset('fonts/GOTHIC.TTF') }};
        }
        * {
            font-family: 'Century Gothic'
        }
        .navbar {
            overflow:hidden;
            background-color:#333;
        }
        .navbar-nav .active{
            border-bottom:4px solid red;
        }
        .navbar-nav .actives{
            border-bottom:4px solid white;
            
        }
        .actives a i{
            font-size:20px;
        }
        .navbar-nav li{
            border-left:1px solid #DAD9D9;
        }
        .navbar-nav li a{
            text-decoration:none;
            font-weight: 700;
            font-size: .99em;
            color:#000000;
            text-transform:uppercase;
            position:relative;
            text-align:center;
            padding:18px 15px;
        }
        .navbar-nav li a::before{
            content:"";
            position:absolute;
            top:100%;
            left:0;
            width:0;
            height:4px;
            background-color:red;
            transition:all .1s linear;
        }
        .navbar-nav li a:hover{
            transition:.05s;
        }
        .navbar-nav li a:hover::before{
            width:100%;
            background-color:red;
        }
        .container{
            max-width: 1280px !important;
        }
    

        body p, a , label {
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div id="app">
        @inject('banner', 'App\Models\Banner')
            @php
                $header_banner    = $banner::select('*')->where('location', 'header')->first();
            @endphp
        <div class="bg-light" >
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('images/logo.png') }}" style="width: 150px !important"/>
                        </a>
                    </div>
                    <div class="col-md-8">
                        <a class="navbar-brand" href="{{ $header_banner->link }}" style="width: 100%;">
                            <img src="{{ $header_banner->image }}" style="width: 100%; height: auto;" />
                        </a>
                    </div>
                </div>
            </div>
        </div>   
        <nav class="navbar navbar-expand-md navbar-white bg-white pt-0 pb-0" style="border-bottom: 1px solid #ddd; border-top: 1px solid #ddd;">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a href="" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="/upcoming" class="nav-link">Upcomming Events</a>
                        </li>
                        <li class="nav-item">
                            <a href="/entrance" class="nav-link">Entrance</a>
                        </li>
                        <li class="nav-item">
                            <a href="" data-toggle="modal" data-target="#about" class="nav-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="" data-toggle="modal" data-target="#contact" class="nav-link">Contact</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item actives">
                            <a href="" class="nav-link">&nbsp;&nbsp;&nbsp;<i class="fa fa-search" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i></a>
                        </li>
                        @guest
                            <li class="nav-item actives">
                                <a href="{{ route('register') }}" class="nav-link">&nbsp;&nbsp;&nbsp;<i class="fa fa-user-plus" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i></a>
                            </li>
                            <li class="nav-item actives">
                                <a href="{{ route('login') }}" class="nav-link">&nbsp;&nbsp;&nbsp;<i class="fa fa-sign-in" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i></a>
                            </li>
                        @else 
                            <li class="nav-item actives">
                                <a href="{{ route('profile.index') }}" class="nav-link">&nbsp;&nbsp;&nbsp;<i class="fa fa-user" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i></a>
                            </li>
                            <li class="nav-item actives">
                                <a href="" class="nav-link">&nbsp;&nbsp;&nbsp;<i class="fa fa-envelope" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i></a>
                            </li>
                        @endguest
                    </ul>

                </div>
            </div>

            @inject('page', 'App\Models\Page')
            @php
                $contact    = $page::select('*')->where('slug', 'contact')->first();
                $about      = $page::select('*')->where('slug', 'about')->first();
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

            
            <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="contactLabel">{!! $contact->title !!}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {!! $contact->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <nav class="bg-white shadow-sm pt-0 pb-0" aria-label="breadcrumb">
            <div class="container">
                    <ul class="breadcrumb" style="margin-bottom: 0; padding-left: 0; padding-top: 3px; padding-bottom: 3px; background-color: transparent;">
                        <li class="breadcrumb-item {{ $breadcrumbs->isEmpty() ? 'active' : '' }}"><a href="/" style="padding: 0">Home</a></li>
                        @foreach ($breadcrumbs as $key => $url)
                            <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}" aria-current="{{ $loop->last ? 'page' : '' }}">
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

        <main>
            @yield('content')
        </main>

        @include('layouts.footer')
    </div>
    {{-- <script type="text/javascript">
        jQuery(document).ready(function($){
            $('select').niceSelect();
        });
    </script> --}}
    @yield('script')
</body>
</html>
