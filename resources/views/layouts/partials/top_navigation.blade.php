<nav id="top-navigation"
    class="navbar navbar-expand-md navbar-default navbar-fixed-top navbar-white bg-white pt-0 pb-0 pr-0">
    <div class="container pr-0">
        <div class=" navbar-collapse d-flex justify-content-end">
            <ul class="navbar-nav navbar-right ml-auto">
                <div class="row ">
                    <div class="col-xs-3">
                        <li id="btn-mego">
                            <a href="{{ route('manage.event.index') }}" class="btn mego-gold-bg py-2" id="btn-organizer"
                                style="height:41px; color: #fff;">Be an Organizer, create your
                                own event!</a>
                        </li>
                    </div>

                    <div class="col-xs-3">
                        <li class="nav-item actives" data-toggle="tooltip" data-placement="bottom" title="Search">
                            <a href="{{ route('search') }}" class="nav-link .heavy-rain-gradient mego-text-hover">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </a>
                        </li>
                    </div>
                    <div class="col-xs-3">
                        <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Email">
                            <a href="{{ route('contact') }}" class="nav-link mego-text-hover">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </a>
                        </li>
                    </div>
                    <div class="col-xs-3">
                        <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Cart">
                            <a href="{{ route('cart.index') }}" class="nav-link mego-text-hover">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                @guest
                                @else
                                <sup>
                                    <div class="badge badge-danger">
                                        {{ Cart::session(auth()->id())->getTotalQuantity() }}
                                    </div>
                                </sup>
                                @endif
                            </a>
                        </li>
                    </div>
                    @guest
                    <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Sign Up">
                        <a href="{{ route('register') }}" class="nav-link mego-text-hover">
                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Sign in">
                        <a href="{{ route('login') }}" class="nav-link mego-text-hover">
                            <i class="fa fa-sign-in" aria-hidden="true"></i>
                        </a>
                    </li>
                    @else

                    <li class="nav-item dropdown ">
                        <a href="{{ route('manage.profile.index') }}" class="nav-link dropdown-toggle"
                            data-toggle="dropdown mego-text-hover">
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

                    <li class="nav-item" data-toggle="tooltip" data-placement="bottom" title="Sign Out">
                        <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                            class="nav-link mego-text-hover">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    @endguest
                </div>
            </ul>
        </div>
    </div>
</nav>