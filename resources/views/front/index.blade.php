<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <style>

    </style>
    </head>
<body>
        <!-- <div class="vavbar navbar-expand-lg"> -->
            <!-- @if (Route::has('login')) -->
                <!-- <div class="collapse navbar-collapse">
                    <a href="/" class="navbar-brand">
                        <img src="{{asset('images/logo.png')}}" alt="" class="d-inline-block align-top" height="auto" width="auto">
                    </a>
                    <button type="button" class="btn btn-outline-secondary">Search</button>
                    <div class="navbar-nav">
                        <a href="/" class="nav-item nav-link">Login</a>
                        <a href="/" class="nav-item nav-link">Register</a>
                        <a href="/" class="nav-item nav-link">Contact</a>
                    </div><br>
                    <div class="banner d-block">
                        <p>Banner</p>
                    </div> -->
                    <!-- @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth -->
                <!-- </div> -->
            <!-- @endif -->
        <!-- </div>         -->
    <!--------NavigatioBar------>
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img src="images/logo.png"></a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
                     </form>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </section>
    <!---slider----->
    <div class="menu">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand ml-sm-5" href="#">Menu</a>
        </nav>
    </div>
    <div id="slider">
    <div class="headerslider">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                <li data-target="#headerslider" data-slide-to="0" class="active"></li>
                <li data-target="#headerslider" data-slide-to="1"></li>
                <li data-target="#headerslider" data-slide-to="2"></li>
                </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('images/slide1.png')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{asset('images/slide1.png')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{asset('images/slide1.png')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                    </div>
                </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>
        </div>
        <div class="img-control">
            <img src="{{asset('images/img1.png')}}" alt="">
            <img src="{{asset('images/img1.png')}}" alt="">
            <img src="{{asset('images/img1.png')}}" alt="">
        </div>
    </div>
    <!-- dropdown menu -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle border" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ALL CATEGORY
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another</a>
                    <a class="dropdown-item" href="#">Something</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle border" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ALL TYPE
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another</a>
                    <a class="dropdown-item" href="#">Something</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle border" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    EVERYBODY
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another</a>
                    <a class="dropdown-item" href="#">Something</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle border" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ALL TIME
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another</a>
                    <a class="dropdown-item" href="#">Something</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- end -->
    <div class="body">

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
