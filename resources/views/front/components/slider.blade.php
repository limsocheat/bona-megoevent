
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
         @foreach($slides as $key=>$slide)
        <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
            <img class="d-block w-100" src="{{ asset($slide->image) }}" alt="First slide">
        </div>
          @endforeach
        {{-- <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('images/slider2.jpg') }}" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('images/slider3.jpg') }}" alt="Third slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('images/slider4.jpg') }}" alt="Fourth slide">
        </div> --}}     
    </div>
</div>