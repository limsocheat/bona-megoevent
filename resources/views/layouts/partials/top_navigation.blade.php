<nav id="top-navigation" class="navbar navbar-expand-md navbar-default navbar-fixed-top navbar-white bg-white p-0">
    
    <div class="container pr-0">
        <div class=" navbar-collapse d-flex justify-content-end">
            <ul class="navbar-nav navbar-right ml-auto">
                <div class="row ">
                    <div class="col-xs-12 m-auto px-3">
                        <li id="btn-mego">
                            <a href="{{ route('manage.event.index') }}" class="btn mego-gold-bg py-2 text-white"
                                id="btn-organizer">Be an Organizer, create your
                                own event!</a>
                        </li>
                    </div>
                    <div class="col-xs-12 px-3">
                        <div class="row">
                            <div class="col-xs-3">
                                <li class="nav-item actives s-icon" data-toggle="tooltip" data-placement="bottom"
                                    title="Search">
                                    <a href="#" id="addClass" class="nav-link .heavy-rain-gradient mego-text-hover">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </div>
                            <div class="col-xs-3">
                                <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Contact">
                                    <a href="{{ route('contact') }}" class="nav-link mego-text-hover">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </div>

                            <li class="nav-item dropdown">
                                <a href="{{ route('manage.profile.index') }}" class="nav-link dropdown-toggle"
                                    data-toggle="dropdown mego-text-hover">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </a>
                                @guest
                                <ul class="dropdown-content p-0 mr-auto ml-auto dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="{{ route('login') }}">Login</a>
                                        </a>
                                    <li>
                                        <a href="{{ route('register')}}">Sign Up</a>
                                    </li>
                                </ul>
                                @else
                                <ul class="dropdown-content p-0 mr-auto ml-auto dropdown-menu dropdown-menu-right">
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
                                @endguest
                            </li>

                            @guest
                            @else
                            <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Sign Out">
                                <a href="#"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                    class="nav-link mego-text-hover">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            @endguest
                        </div>
                    </div>
                    @include('layouts.partials.main_navbar_dropdown')
                </div>
            </ul>
        </div>
    </div>
    
    <div id="qnimate" class="off">
        <div id="search" class="open">
            <button data-widget="remove" id="removeClass" class="close" type="button">×</button>
            <form action="{{ route('search') }}" autocomplete="off">
                <input type="text" placeholder="Type search keywords here" value="" name="keyword" id="keyword">
                <button class="btn btn-lg mego-gold-bg" type="submit"><i class="fa fa-search" aria-hidden="true"></i>
                    Search</button>
            </form>
        </div>
    </div>
</nav>


<script>
    $(document).ready(function() {
        $("#addClass").click(function () {
        $('#qnimate').addClass('popup-box-on');
        });
        
        $("#removeClass").click(function () {
        $('#qnimate').removeClass('popup-box-on');
        });
    });
</script>