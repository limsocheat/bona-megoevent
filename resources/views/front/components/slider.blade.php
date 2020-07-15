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
                <h1 class="font-weight-bold text-white slide-title">{{ $fullscreen_slider->title }}</h1>
                <h4 class="slider-subtitle max-line-3">{{ $fullscreen_slider->sub_title}}</h4>
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
    });
</script>