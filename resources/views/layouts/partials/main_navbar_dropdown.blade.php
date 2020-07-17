
<button class="mego-navbar-toggler navbar-toggler border-dark ml-auto mr-3" type="button" data-toggle="collapse"
    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
    aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><i class="fa fa-bars" style="color:#1f1c1c; font-size:28px;"></i></span>
</button>
<script>
    $(document).ready(function() {
        $(window).resize(function(){
            if ($(window).width() >= 980){
                $(".navbar .dropdown-toggle").hover(function () {
                    $(this).parent().toggleClass("show");
                    $(this).parent().find(".dropdown-menu").toggleClass("show");
                });
                $( ".navbar .dropdown-menu" ).mouseleave(function() {
                    $(this).removeClass("show");
                });

                $('.navbar .dropdown > a').click(function(){
                    location.href = this.href;
                });
            } else {
                $('.navbar .dropdown > a').click(function(){
                    return;
                });
            }
        });
        $('.navbar .dropdown > a').click(function(){
            location.href = this.href;
        });
    });
</script>