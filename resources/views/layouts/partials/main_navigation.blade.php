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
            <ul id="navbar-nav" class="navbar-nav mr-auto">
                <li class="nav-item {{ Route::currentRouteName() == 'index' ? 'active' : ''}}">
                    <a href="{{ route('index') }}" class="nav-link nav-link-left pl-0 ml-0">Home</a>
                </li>
                <li
                    class="nav-item dropdown {{ Route::currentRouteName() == 'events' || Route::currentRouteName() == 'event' ? 'active' : ''}}">
                    <a href="{{ route('events') }}" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Upcoming Events</a>
                    <div class="row">
                        <div class="dropdown-menu mego-dropdown-menu bg-none" aria-labelledby="navbarDropdown"
                            style="margin-top: -7px; ">
                            <div class=" container">
                                <div class="col-md-2 mego-column1 rounded-left py-3">
                                    <h2>About Us</h2>
                                    <p class="title">More than a growth engine, ICM transforms industries for the
                                        future.</p>
                                </div>
                                <div class="col-md-3 mego-bg-mega bg-white py-3">
                                    @inject('event_category', 'App\Models\EventCategory')
                                    @php
                                    $event_categories = $event_category::select('*')->limit(4)->get();
                                    @endphp
                                    <h2 class="ml-3">Event Categories</h2>
                                    <ul class="list-group list-group-flush">
                                        @foreach ($event_categories as $event_category)
                                        <a href="{{ route('events') }}" class="list-group-item text-left">
                                            {{ $event_category->name }}
                                        </a>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-7 mego-bg-mega rounded-right py-3"
                                    style="border-left: 2px solid #ceba48;">
                                    <h2 class="ml-3">Highlights</h2>
                                    @inject('event', 'App\Models\Event')
                                    @php
                                    $events = $event::select('*')->limit(2)->get();
                                    @endphp
                                    <div class="row container">
                                        @foreach ($events as $event)
                                        <div class="col-md-6">
                                            @include('front.components.event.card')</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <ul id="navbar-nav" class="navbar-nav navbar-right ml-auto">
                <li class="nav-item ">
                    <a href="" data-toggle="modal" data-target="#about" class="nav-link nav-link-right pr-0">About</a>
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

                $('.navbar .dropdown > a').click(function(){
                    location.href = this.href;
                });
            } else {
                $('.navbar .dropdown > a').click(function(){
                    return;
                });
            }
        });
        $('.navbar .dropdown > a').click(function(){
            location.href = this.href;
        });
    });
</script>