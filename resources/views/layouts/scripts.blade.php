<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
</script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-lightbox/0.2.12/slick-lightbox.min.js">
</script>
<script type="text/javascript" src="{{ asset('plugins/nice-select/js/jquery.nice-select.js') }}"></script>
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="{{ asset('/plugins/image-uploader/image-uploader.js') }}">
</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

</script>
@yield('script')
<script type="text/javascript">
    $(document).ready(function(){
            $(".nav-item").on("click", function(){
            $(".collapse").find(".active").removeClass("active");
            $(this).addClass("active");
            });
            $('[data-toggle="tooltip"]').tooltip();
           
        });
        
</script>