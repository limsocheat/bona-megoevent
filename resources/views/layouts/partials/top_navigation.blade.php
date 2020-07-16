<style type="text/css">
    #top-navigation .popup-box-on {
        display: block !important;
    }

    #top-navigation .off {
        display: none;
    }

    #top-navigation .chat_box .chat_message_wrapper ul.chat_message>li+li {
        margin-top: 4px;
    }

    #top-navigation #search.open {
        opacity: 1;
        transform: translate(0px, 0px) scale(1, 1);
    }

    #top-navigation #search {
        background-color: #fff;
        height: 100%;
        left: 0;
        position: fixed;
        top: 0;
        transition: all 0.5s ease-in-out 0s;
        width: 100%;
        z-index: 2000;

    }

    #top-navigation #search .close {
        color: #be5254;
        font-size: 40px;
        opacity: 1;
        padding: 10px 17px;
        position: fixed;
        right: 15px;
        top: 15px;
    }

    #top-navigation button.close {
        background: transparent none repeat scroll 0 0;
        border: 0 none;
        cursor: pointer;
    }

    #top-navigation .close {
        float: right;
        font-weight: bold;
        line-height: 1;
        text-shadow: 0 1px 0 #fff;
    }

    #top-navigation #search input[type="text"] {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: 0 none;
        color: #333;
        font-family: "Open Sans", sans-serif;
        font-size: 50px;
        font-weight: 300;
        margin: -51px auto 0;
        outline: medium none;
        padding-left: 30px;
        padding-right: 30px;
        position: absolute;
        text-align: center;
        top: 50%;
        width: 100%;
    }

    #top-navigation #search .btn {
        left: 50%;
        margin-top: 60px;
        padding: 10px 50px;
        position: absolute;
        top: 50%;
        transform: translateX(-50%);
    }
</style>

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
                        <li class="nav-item actives s-icon" data-toggle="tooltip" data-placement="bottom"
                            title="Search">
                            <a href="#" id="addClass" class="nav-link .heavy-rain-gradient mego-text-hover">
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