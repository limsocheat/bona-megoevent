<style>
    /* modal */
    /* .slider-for img {
        width: 100%;
        }
    .modal-content {
        background-color: rgba(0, 0, 0, 0);
        border: 0 none;
        border-radius: 0;
        margin-left: 1px;
        .modal-body {
            padding: 0;
            iframe {
                margin-bottom: -5px;
            }
        }
        .modal-header {
            border: 0 none;
            height: 0;
            min-height: 0;
            padding: 0;
            .close {
                background-color: #000000 !important;
                border: 2px solid #ffffff !important;
                border-radius: 13px;
                color: #ffffff;
                font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
                font-size: 20px;
                font-weight: 700;
                height: 26px;
                opacity: 1;
                padding-bottom: 0;
                position: absolute;
                right: -13px;
                text-shadow: none;
                top: -13px;
                width: 26px;
                z-index: 1;
            }
        }
    } */

    .slick-next:before {
        color: black;
    }

    .slick-prev:before {
        color: black;
    }

    .home_slider_fullscreen .slick-prev {
        margin-left: 100px !important;
        ;
        z-index: 1;
    }

    .home_slider_fullscreen .slick-next {
        margin-right: 100px !important;
    }

    .home_slider_modal {}

    /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 600px) {
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

        .home_slider_fullscreen .slick-prev {
            margin-left: 50px !important;
            ;
            z-index: 1;
        }

        .home_slider_fullscreen .slick-next {
            margin-right: 50px !important;
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

        .slickLightbox img {
            max-width: 200px;
            max-height: 310px;
        }
    }

    /* Large devices (laptops/desktops, 992px and up) */
    @media only screen and (min-width: 992px) {
        .home_slider_carousel_item {
            height: 330px !important;
            width: auto !important;
        }

        #home_slider_carousel {
            margin-top: -165px;
        }

        .home_slider_fullscreen_content {
            position: absolute;
            top: 80px;
        }
    }

    /* Extra large devices (large laptops and desktops, 1200px and up) */
    @media only screen and (min-width: 1200px) {
        .example {
            background: pink;
        }
    }

    .slick-lightbox-slick-item-inner, .slick-lightbox-slick-img {
        max-height: auto !important;
    }

    .fullscreen_slider_image {
        height: 678px;
        width: 1920px;
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>
@inject('slider', 'App\Models\Slide')
@php
    $fullscreen_sliders = $slider::select('*')->where('location', 'fullscreen')->get();
    $thumb_sliders      = $slider::select('*')->where('location', 'thumbnail')->get();
@endphp
@if (count($fullscreen_sliders))
    <div class="home_slider_fullscreen">

        @foreach ($fullscreen_sliders as $fullscreen_slider)
            <div class="fluid mx-0 px-0">
                <div class="container">
                    <div class="home_slider_fullscreen_content">
                        <h1 class="font-weight-bold">{{ $fullscreen_slider->title }}</h1>
                        <h3>{{ $fullscreen_slider->sub_title }}</h3>
                    </div>
                </div>
                <img src="{{ $fullscreen_slider->image_url }}" alt="{{ $fullscreen_slider->title }}" class="fullscreen_slider_image">
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