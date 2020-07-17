<style>
    /* Slider */

    @media only screen and (max-width: 600px) {
        #exhibitor-carousel .slick-track .slick-slide {
            margin-left: auto;
            margin-right: auto;
        }

        #exhibitor-carousel .slick-list>div {
            margin-left: auto;
            margin-right: auto;
        }
    }

    #exhibitor-carousel .slick-track :first-child {
        margin-left: 0 !important;
    }

    #exhibitor-carousel .slick-track :last-child {
        margin-right: 0 !important;
    }

    #exhibitor-carousel .slick-track .slick-slide {
        margin: 0 10px;
    }

    #exhibitor-carousel .slick-slide img {
        width: 100%;
    }

    #exhibitor-carousel .slick-slider {
        position: relative;
        display: block;
        box-sizing: border-box;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-touch-callout: none;
        -khtml-user-select: none;
        -ms-touch-action: pan-y;
        touch-action: pan-y;
        -webkit-tap-highlight-color: transparent;
    }

    #exhibitor-carousel .slick-list {
        position: relative;
        display: block;
        overflow: hidden;
        margin: 0;
        padding: 0;
    }

    #exhibitor-carousel .slick-list:focus {
        outline: none;
    }

    #exhibitor-carousel .slick-list.dragging {
        cursor: pointer;
        cursor: hand;
    }

    #exhibitor-carousel .slick-slider .slick-track,
    #exhibitor-carousel .slick-slider .slick-list {
        -webkit-transform: translate3d(0, 0, 0);
        -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        -o-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }

    #exhibitor-carousel .slick-track {
        position: relative;
        top: 0;
        left: 0;
        display: block;
    }

    #exhibitor-carousel .slick-track:before,
    #exhibitor-carousel .slick-track:after {
        display: table;
        content: '';
    }

    #exhibitor-carousel .slick-track:after {
        clear: both;
    }

    #exhibitor-carousel .slick-loading .slick-track {
        visibility: hidden;
    }

    #exhibitor-carousel .slick-slide {
        display: none;
        float: left;
        height: 100%;
        min-height: 1px;
    }

    #exhibitor-carousel [dir='rtl'] .slick-slide {
        float: right;
    }

    #exhibitor-carousel .slick-slide img {
        display: block;
    }

    #exhibitor-carousel .slick-slide.slick-loading img {
        display: none;
    }

    #exhibitor-carousel .slick-slide.dragging img {
        pointer-events: none;
    }

    #exhibitor-carousel .slick-initialized .slick-slide {
        display: block;
    }

    #exhibitor-carousel .slick-loading .slick-slide {
        visibility: hidden;
    }

    #exhibitor-carousel .slick-vertical .slick-slide {
        display: block;
        height: auto;
        border: 1px solid transparent;
    }

    #exhibitor-carousel .slick-arrow.slick-hidden {
        display: none;
    }

    #exhibitor-carousel .slick-list>div {
        margin-left: 0;
    }
</style>

<div class="container" id="exhibitor-carousel">
    <section class="customer-logos slider">
        @foreach ($exhibitors as $exhibitor)
        <div class="slide">
            @include('front.components.exhibitor.card')
        </div>
        @endforeach
    </section>
</div>

<script type="text/javascript">
    jQuery(document).ready(function($){
    $('.customer-logos').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        centerMode: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 1
            }
        }]
    });
});
</script>