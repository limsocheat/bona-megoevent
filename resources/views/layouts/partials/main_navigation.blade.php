<nav id="main-navigation"
    class="navbar navbar-expand-md navbar-default fixed-top sticky-top navbar-white bg-white pt-0 pb-0 "
    style="border-bottom: 1px solid #efefef; border-top: 1px solid #efefef;">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right border-dark" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fa fa-bars" style="color:#1f1c1c; font-size:28px;"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul id="navbar-nav" class="navbar-nav mr-auto">
                <li class="nav-item {{ Route::currentRouteName() == 'index' ? 'active' : ''}}">
                    <a href="{{ route('index') }}" class="nav-link nav-link-left pl-0 ml-0">Home</a>
                </li>
                <li
                    class="nav-item {{ Route::currentRouteName() == 'upcoming' || Route::currentRouteName() == 'event' ? 'active' : ''}}">
                    <a href="{{ route('upcoming') }}" class="nav-link">Upcoming Events</a>
                </li>
                <li
                    class="nav-item {{ Route::currentRouteName() == 'product' || Route::currentRouteName() == 'show.product' ? 'active' : ''}}">
                    <a href="{{ route('product') }}" class="nav-link">Products</a>
                </li>
            </ul>
            <ul id="navbar-nav" class="navbar-nav navbar-right ml-auto">
                <li class="nav-item ">
                    <a href="" data-toggle="modal" data-target="#about" class="nav-link">About</a>
                </li>
                <li class="nav-item  {{ Request::routeIs('contact') ? 'active' : ''}}">
                    <a href="{{route('contact')}}" class="nav-link nav-link-right pr-0 mr-0">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>