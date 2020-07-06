@extends('layouts.app')

@section('title', 'Manage')

@section('content')
    <div class="container py-4">
        <h1>Manage</h1>
        <nav class="navbar navbar-expand-sm   navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item dropdown dmenu">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Our Service
                        </a>
                        <div class="dropdown-menu sm-menu">
                            <a class="dropdown-item" href="#">service2</a>
                            <a class="dropdown-item" href="#">service 2</a>
                            <a class="dropdown-item" href="#">service 3</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Call</a>
                    </li>
                    <!-- <li class="nav-item dropdown dmenu">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                      Dropdown link
                    </a>
                    <div class="dropdown-menu sm-menu">
                      <a class="dropdown-item" href="#">Link 1</a>
                      <a class="dropdown-item" href="#">Link 2</a>
                      <a class="dropdown-item" href="#">Link 3</a>
                      <a class="dropdown-item" href="#">Link 4</a>
                      <a class="dropdown-item" href="#">Link 5</a>
                      <a class="dropdown-item" href="#">Link 6</a>
                    </div>
                  </li> -->
                </ul>
                <div class="social-part">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </div>
            </div>
        </nav>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
        	  $('.navbar-light .dmenu').hover(function () {
        			  $(this).find('.sm-menu').first().stop(true, true).slideDown(150);
        		  }, function () {
        			  $(this).find('.sm-menu').first().stop(true, true).slideUp(105)
        		  });
        	  });
        </script>
    </div>
@endsection