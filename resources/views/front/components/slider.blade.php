{{-- 
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach($slides as $key=>$slide)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="{{$key == 0 ? 'active' : ''}}"></li>
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach($slides as $key=>$slide)
            <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                <img class="d-block w-100" src="{{ asset($slide->image) }}" alt="First slide">
            </div>
        @endforeach
    </div>
</div> --}}
<style>


    .slick-next:before {
        color: black;
    }

    .slick-prev:before {
        color: black;
    }

    .home_slider_fullscreen .slick-prev{
        margin-left: 100px !important;; 
        z-index: 1;
    }

    .home_slider_fullscreen .slick-next{
        margin-right: 100px !important;
    }
    .home_slider_modal{
        
    }
    /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 600px) {
        .home_slider_carousel_item {
            height: 80px !important;
            width: auto  !important;
        }

        #home_slider_carousel {
            margin-top: 10px;
        }

        .home_slider_fullscreen_content {
            position: absolute; top: 10px;
        }

        .home_slider_fullscreen .slick-prev{
            margin-left: 50px !important;; 
            z-index: 1;
        }

        .home_slider_fullscreen .slick-next{
            margin-right: 50px !important;
        }
    }

    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (min-width: 600px) {
         .home_slider_carousel_item {
            height: 80px !important;
            width: auto  !important;
        }

        #home_slider_carousel {
            margin-top: 0;
        }

        .home_slider_fullscreen_content {
            position: absolute; top: 10px;
        }
    }

    /* Medium devices (landscape tablets, 768px and up) */
    @media only screen and (min-width: 768px) {
        .home_slider_carousel_item {
            height: 200px !important;
            width: auto  !important;
        }

        #home_slider_carousel {
            margin-top: -20px;
        }

        .home_slider_fullscreen_content {
            position: absolute; top: 30px;
        }
    } 

    /* Large devices (laptops/desktops, 992px and up) */
    @media only screen and (min-width: 992px) {
        .home_slider_carousel_item {
            height: 330px !important;
            width: auto  !important;
        }

        #home_slider_carousel {
            margin-top: -165px;
        }

        .home_slider_fullscreen_content {
            position: absolute; top: 80px;
        }
    } 

    /* Extra large devices (large laptops and desktops, 1200px and up) */
    @media only screen and (min-width: 1200px) {
        .example {background: pink;}
    }


</style>

<div class="home_slider_fullscreen">
    <div class="fluid mx-0 px-0">
        <div class="container">
            <div class="home_slider_fullscreen_content">
                <h1 class="font-weight-bold">Hello</h1>
            </div>
        </div>
        <img src="https://singroll.com/web/admin/uploads/2019/08/banner1.jpg" alt="Banner 1">
    </div>

    <div class="fluid mx-0 px-0">
        <div class="container">
            <div class="home_slider_fullscreen_content">
                <h1 class="font-weight-bold">Banner 2</h1>
            </div>
        </div>
        <img src="https://singroll.com/web/admin/uploads/2019/08/banner2.jpg" alt="Banner 2">
    </div>
</div>

<div id="home_slider_carousel" class="container">
    <div class="home_slider_carousel">
        <img src="https://singroll.com/web/admin/uploads/2020/02/palate-s-1.jpg" alt="Banner 1" class="home_slider_carousel_item">
        <img src="https://singroll.com/web/admin/uploads/2020/02/Pestbusters_Guidebook_FA_hr_page-0001_s.jpg" alt="Banner 1" class="home_slider_carousel_item">
        <img src="https://singroll.com/web/admin/uploads/2019/11/ad7-11.jpg" alt="Banner 1" class="home_slider_carousel_item">
        <img src="https://singroll.com/web/admin/uploads/2020/04/2020-04-26.png" alt="Banner 1" class="home_slider_carousel_item">
        <img src="https://singroll.com/web/admin/uploads/2020/04/93950663_1945787598899392_661082220898811904_o.jpg" alt="Banner 1" class="home_slider_carousel_item">
    </div>
</div>
<!-- <div id="home_slider_modal" class="container">
    <div class="home_slider_carousel">
        <img src="https://singroll.com/web/admin/uploads/2020/02/palate-s-1.jpg" alt="Banner 1" class="home_slider_carousel_item">
        <img src="https://singroll.com/web/admin/uploads/2020/02/Pestbusters_Guidebook_FA_hr_page-0001_s.jpg" alt="Banner 1" class="home_slider_carousel_item">
        <img src="https://singroll.com/web/admin/uploads/2019/11/ad7-11.jpg" alt="Banner 1" class="home_slider_carousel_item">
        <img src="https://singroll.com/web/admin/uploads/2020/04/2020-04-26.png" alt="Banner 1" class="home_slider_carousel_item">
        <img src="https://singroll.com/web/admin/uploads/2020/04/93950663_1945787598899392_661082220898811904_o.jpg" alt="Banner 1" class="home_slider_carousel_item">
    </div>
</div> -->
<script type="text/javascript">
    jQuery(document).ready(function($){
        $('.home_slider_fullscreen').slick({
            infinite: true,
            adaptiveHeight: true,
            dots: false,
            autoplay: true,
            autoplaySpeed: 2000,
            centerPadding: '0px',
            centerMode: true,
            slidesToShow: 1,
        });

        $('.home_slider_carousel').slick({
            infinite: true,
            dots: false,
            autoplay: true,
            autoplaySpeed: 2000,
            centerPadding: '0px',
            centerMode: true,
            variableWidth: true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
</script>