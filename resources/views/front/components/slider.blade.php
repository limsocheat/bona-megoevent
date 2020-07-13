<style>
    /* .slick-next:before {
        color: black;
    }

    .slick-prev:before {
        color: black;
    } */
    .home_slider_fullscreen_content h3 {
        width: 40vw;
        margin-left: 60px;
        padding: 15px;
        color: white;
        background-color: #02020242;
    }

    .home_slider_fullscreen .slick-prev {
        margin-left: 100px !important;
        ;
        z-index: 1;
    }

    .home_slider_fullscreen .slick-next {
        margin-right: 100px !important;
    }

    .home_slider_carousel .slick-prev {
        margin-left: 50px !important;
        ;
        z-index: 1;
    }

    .home_slider_carousel .slick-next {
        margin-right: 50px !important;
    }

    .home_slider_modal {}

    /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 600px) {
        .home_slider_fullscreen_content h1 {
            font-size: 6vw;
        }

        .home_slider_carousel_item {
            height: 80px !important;
            width: auto !important;
        }

        #home_slider_carousel {
            margin-top: 10px;
        }

        .home_slider_fullscreen_content {
            position: absolute;
            top: 10px;
        }

        .fullscreen_slider_image {
            max-height: 320px;
            max-width: auto;
        }

        .home_slider_fullscreen .slick-prev {
            margin-left: 50px !important;
            ;
            z-index: 1;
        }

        .home_slider_fullscreen .slick-next {
            margin-right: 50px !important;
        }

        .slider-subtitle {
            display: none;
        }
    }

    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (min-width: 600px) {
        .home_slider_carousel_item {
            height: 80px !important;
            width: auto !important;
        }

        #home_slider_carousel {
            margin-top: 0;
        }

        .home_slider_fullscreen_content {
            position: absolute;
            top: 10px;
        }

        .fullscreen_slider_image {
            min-height: 320px;
            min-width: auto;
        }

        .slider-subtitle {
            display: none;
        }
    }

    /* Medium devices (landscape tablets, 768px and up) */
    @media only screen and (min-width: 768px) {
        .home_slider_carousel_item {
            height: 200px !important;
            width: auto !important;
        }

        #home_slider_carousel {
            margin-top: -20px;
        }

        .home_slider_fullscreen_content {
            position: absolute;
            top: 30px;
        }

        .fullscreen_slider_image {
            max-width: 100%;
            max-height: 400px;

        }

        .slickLightbox img {
            max-width: 200px;
            max-height: 310px;
        }

        .slider-subtitle {
            display: block;
        }
    }

    /* Large devices (laptops/desktops, 992px and up) */
    @media only screen and (min-width: 992px) {
        .home_slider_carousel_item {
            height: 200px !important;
            width: auto !important;
        }

        #home_slider_carousel {
            margin-top: -70px;
        }

        .home_slider_fullscreen_content {
            position: absolute;
            top: 80px;
        }

        .fullscreen_slider_image {
            max-height: 560px;
            max-width: 100%;
        }
    }

    /* Extra large devices (large laptops and desktops, 1200px and up) */
    @media only screen and (min-width: 1200px) {
        .example {
            background: pink;
        }

    }

    .slick-lightbox-slick-item-inner,
    .slick-lightbox-slick-img {
        max-height: auto !important;
    }

    .fullscreen_slider_image {
        height: auto;
        width: 100%;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .home_slider_carousel_item {
        margin-left: 15px;
        margin-right: 15px;
    }

    /* .slick-lightbox-slick-item-inner {
        background: white;
        height: 100vh;
        max-width: 600px;
        width: 100%;
        text-align: center;
        vertical-align: middle;
        position: relative;
    }

    .slick-lightbox-slick-item-inner img {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
    } */

    .home_slider_fullscreen .slick-prev:before,
    .home_slider_fullscreen .slick-next:before {
        font-size: 30px;
    }

    .home_slider_carousel .slick-prev:before,
    .home_slider_carousel .slick-next:before {
        font-size: 25px;
        color: black;
    }
</style>
@inject('slider', 'App\Models\Slide')
@php
$fullscreen_sliders = $slider::select('*')->where('location', 'fullscreen')->get();
$thumb_sliders = $slider::select('*')->where('location', 'thumbnail')->get();
@endphp
@if (count($fullscreen_sliders))
<div class="home_slider_fullscreen">

    @foreach ($fullscreen_sliders as $fullscreen_slider)
    <div class="fluid mx-0 px-0">
        <div class="container">
            <div class="home_slider_fullscreen_content ">
                <div class="row mt-5">
                    <div class="col-md-7">
                        <h1 class="font-weight-bold text-white" id="font-title">{{ $fullscreen_slider->title }}</h1>
                    </div>
                    <div class="col-md-5">
                        <h3 class="slider-subtitle" id="sub-title">{{ $fullscreen_slider->sub_title }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ $fullscreen_slider->image_url }}" alt="{{ $fullscreen_slider->title }}"
            class="fullscreen_slider_image">
    </div>
    @endforeach
</div>
@endif

@if (count($thumb_sliders))

<div id="home_slider_carousel" class="container">
    <div class="home_slider_carousel">
        @foreach ($thumb_sliders as $thumb_slider)
        <a href="{{ $thumb_slider->image_url }}" target="_blank">
            <img src="{{ $thumb_slider->image_url }}" alt="{{ $thumb_slider->title }}"
                class="home_slider_carousel_item">
        </a>
        @endforeach
    </div>
</div>

@endif
<script type="text/javascript">
    jQuery(document).ready(function($){
        // $('.slider-for').slick({
        //     slidesToShow: 1,
        //     slidesToScroll: 1,
        //     fade: true,
        //     asNavFor: '.home_slider_carouse'
        // });

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
            adaptiveHeight: false,
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

        $('.home_slider_carousel').slickLightbox({
        });

        // $('.home_slider_carousel').slickLightbox({
        //     infinite: true,
        //     dots: false,
        //     autoplay: true,
        //     autoplaySpeed: 2000,
        //     centerPadding: '0px',
        //     centerMode: true,
        //     variableWidth: true,
        //     responsive: [
        //         {
        //             breakpoint: 1024,
        //             settings: {
        //                 slidesToShow: 3,
        //                 slidesToScroll: 3,
        //                 infinite: true,
        //             }
        //         },
        //         {
        //             breakpoint: 600,
        //             settings: {
        //                 slidesToShow: 2,
        //                 slidesToScroll: 2
        //             }
        //         },
        //         {
        //             breakpoint: 480,
        //             settings: {
        //                 slidesToShow: 1,
        //                 slidesToScroll: 1
        //             }
        //         }
        //     ]
        // });
    });
</script>