<style>
    /* adds some margin below the link sets */
    .navbar .dropdown-menu div[class*="col"] {
        margin-bottom: 1rem;
    }

    .navbar .dropdown-menu {
        border: none;
        background-color: #0060c8 !important;
    }

    /* breakpoint and up - mega dropdown styles */
    @media screen and (min-width: 992px) {

        /* remove the padding from the navbar so the dropdown hover state is not broken */
        .navbar {
            padding-top: 0px;
            padding-bottom: 0px;
        }

        /* remove the padding from the nav-item and add some margin to give some breathing room on hovers */
        .navbar .nav-item {
            padding: .5rem .5rem;
            margin: 0 .25rem;
        }

        /* makes the dropdown full width */
        .navbar .dropdown {
            position: static;
        }

        .navbar .dropdown-menu {
            width: 100%;
            left: 0;
            right: 0;
            /* height of nav-item */
            top: 45px;

            display: block;
            visibility: hidden;
            opacity: 0;
            transition: visibility 0s, opacity 0.3s linear;

        }




        /* shows the dropdown menu on hover */
        .navbar .dropdown:hover .dropdown-menu,
        .navbar .dropdown .dropdown-menu:hover {
            display: block;
            visibility: visible;
            opacity: 1;
            transition: visibility 0s, opacity 0.3s linear;
        }

        .navbar .dropdown-menu {
            border: 1px solid rgba(0, 0, 0, .15);
            background-color: rgb(17, 17, 17);
        }

    }
</style>
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category 1
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#">Active</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.col-md-4  -->
                                <div class="col-md-4">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#">Active</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <a href="">
                                        <img src="https://dummyimage.com/200x100/ccc/000&text=image+link" alt=""
                                            class="img-fluid">
                                    </a>
                                    <p class="text-white">Short image call to action</p>
                                </div>
                            </div>
                        </div>
                    </div>
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
<script>
    $(document).ready(function() {
        $(window).resize(function(){
            if ($(window).width() >= 980){
                $(".navbar .dropdown-toggle").hover(function () {
                    $(this).parent().toggleClass("show");
                    $(this).parent().find(".dropdown-menu").toggleClass("show");
                });
                $( ".navbar .dropdown-menu" ).mouseleave(function() {
                    $(this).removeClass("show");
                });
            }
        });
    });
</script>