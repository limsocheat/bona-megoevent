<style>
    .carousel-control-prev .carousel-control-next span{
        background: gray;
        width:40px;
        height:auto;
    }
    .carousel-caption{
        text-align:left;
        margin-bottom:7%;
        width:30%;
    }
    .carousel-caption h3{
        font-size:30px;
        font-weight:bold;
    }
    .carousel-caption p{
        font-size:16px;
    }
    .carousel-control-next, .carousel-control-prev{
        height:40px; 
        width:40px; 
        padding:12px; top:50%; 
        bottom:auto; 
        transform:translateY(-50%); 
        background-color: #000000; 
    }
</style>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($entrances as $key=>$entrance)
                
         
        <div class="carousel-item {{ $key ==0 ?'active' :''}}active">
                <img class="d-block w-100" src="{{ asset($entrance->image)}}"
                alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                <h3>{{$entrance->title}}</h3>
                <p>{{$entrance->sub_title}}</p>
                </div>
            </div>
               @endforeach
            {{-- <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('images/slider2.jpg') }}"
                alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h3>FESTIVALS & EVENTS</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci esse vitae exercitationem fugit, numquam minus!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('images/slider3.jpg') }}"
                alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h3>FESTIVALS & EVENTS</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci esse vitae exercitationem fugit, numquam minus!</p>
                </div>
            </div> --}}
        </div>
        <a class="carousel-control-prev"href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>