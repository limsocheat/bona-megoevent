<!-- Footer -->
@inject('widget', 'App\Models\Widget')
@php
$footers1 = $widget::select('*')->where('location', 'footer-1')->get();
$footers2 = $widget::select('*')->where('location', 'footer-2')->get();
$footers3 = $widget::select('*')->where('location', 'footer-3')->get();
$footers4 = $widget::select('*')->where('location', 'footer-4')->get();
@endphp


<style type="text/css">
    #mego-footer ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    #mego-footer ul li a {
        color: #fff;
        text-decoration: none;
    }

    #mego-footer ul li a:hover {
        color: #C5B358
    }

    #mego-footer a {
        color: #fff
    }
</style>
<footer class="page-footer font-small pt-4 bg-dark text-white" id="mego-footer">
    <!-- Footer Links -->
    <div class="container text-md-left">
        <!-- Grid row -->
        <div class="row">
            <div class="col-md-3">
                @foreach ($footers1 as $footer1)
                <h5 class="font-weight-bold text-uppercase mt-3 mb-4">{{ $footer1->name }}</h5>
                <p>
                    {!! $footer1->body !!}
                </p>
                @endforeach
            </div>
            <div class="col-md-3">
                @foreach ($footers2 as $footer2)
                <h5 class="font-weight-bold text-uppercase mt-3 mb-4">{{ $footer2->name }}</h5>
                <p>
                    {!! $footer2->body !!}
                </p>
                @endforeach
            </div>
            <div class="col-md-3">
                @foreach ($footers3 as $footer3)
                <h5 class="font-weight-bold text-uppercase mt-3 mb-4">{{ $footer3->name }}</h5>
                <p>
                    {!! $footer3->body !!}
                </p>
                @endforeach
            </div>
            <div class="col-md-3">
                @foreach ($footers4 as $footer4)
                <h5 class="font-weight-bold text-uppercase mt-3 mb-4">{{ $footer4->name }}</h5>
                <p>
                    {!! $footer4->body !!}
                </p>
                @endforeach
            </div>
        </div>
        <!-- Grid row -->
    </div>
    <!-- Footer Links -->
    <hr>
    <!-- Call to action -->
    {{-- <ul class="list-unstyled list-inline text-center py-2"> --}}
    <div class="bg-white pr-5 pl-5 m-auto mego-logo-footer">
        <div class="container text-center">
            <!-- Grid row -->
            <div class="row">
                <!-- Grid column -->
                <div class="col-md-3 py-2">
                    <div class="text-xs-center">
                        <a class="footer-logo float-md-left footer-center" href="http://megomega.com.sg/"
                            target="_blank">
                            <img src="{{ asset('images/megomege-footer.png') }}" />
                        </a>
                    </div>
                </div>
                <div class="col-md-3 p-2">
                    <div class="text-xs-center ">
                        <a class="footer-logo" href="http://megoshopping.com.sg/" target="_blank">
                            <img src="{{ asset('images/megoshopping-footer.png') }}" />
                        </a>
                    </div>
                </div>
                <div class="col-md-3 p-2">
                    <div class="text-xs-center">
                        <a class="footer-logo " href="https://bona.com.sg/" target="_blank">
                            <img src="{{ asset('images/bonabot-footer.png') }}" />
                        </a>
                    </div>
                </div>
                <div class="col-md-3 py-2">
                    <div class="text-xs-center">
                        <a class="footer-logo float-md-right footer-center" href="https://singroll.com/web/"
                            target="_blank">
                            <img src="{{ asset('images/singro-logo-footer.png') }}" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- </ul> --}}
    <!-- Call to action -->
    <hr>
    <!-- Social buttons -->
    <ul class="list-unstyled list-inline text-center">
        <li class="list-inline-item">
            <a class="btn-floating btn-fb mx-1">
                <i class="fa fa-facebook-square" aria-hidden="true"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a class="btn-floating btn-tw mx-1">
                <i class="fa fa-twitter-square" aria-hidden="true"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a class="btn-floating btn-gplus mx-1">
                <i class="fa fa-google-plus-square" aria-hidden="true"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a class="btn-floating btn-li mx-1">
                <i class="fa fa-linkedin-square" aria-hidden="true"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a class="btn-floating btn-dribbble mx-1">
                <i class="fa fa-dribbble" aria-hidden="true"></i>
            </a>
        </li>
    </ul>
    <!-- Social buttons -->
    <!-- Copyright -->
    <div class="text-center py-3">
        © 2020 Copyright: megoevent.com
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->