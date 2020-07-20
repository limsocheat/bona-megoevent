<style>
    /* slideshow */

    #mego-luckydrow-mage ul {
        width: 400px;
        height: 200px;

        margin: 0 auto;

        position: relative;

        list-style: none;

        -webkit-perspective: 700px;
        perspective: 700px;
    }

    #mego-luckydrow-mage ul li {
        position: absolute;

        transform-origin: 0 100%;
    }

    #mego-luckydrow-mage li.current {
        transition: all 0.3s ease-out;
        opacity: 1.0;
    }

    #mego-luckydrow-mage li.in {
        opacity: 0.0;
        transform: rotate3d(1, 0, 0, -90deg);
    }

    #mego-luckydrow-mage li.out {
        transition: all 0.3s ease-out;
        opacity: 0.0;
        transform: rotate3d(1, 0, 0, 90deg);
    }
</style>
<div id="mego-luckydrow-mage">
    <div class="container">
        <ul id='slideshow'>
            <li><img src='http://placehold.it/500x200&text=Mak Ka Veng' alt=''></li>
            <li><img src='http://placehold.it/500x200&text=Ho Kit Zi' alt=''></li>
            <li><img src='http://placehold.it/500x200&text=Aaden Chan' alt=''></li>
            <li><img src='http://placehold.it/500x200&text=Kin Ho' alt=''></li>
            <li><img src='http://placehold.it/500x200&text=Johnson Lam' alt=''></li>
            <li><img src='http://placehold.it/500x200&text=Simon Leong' alt=''></li>
            <li><img src='http://placehold.it/500x200&text=Veng Mak' alt=''></li>
            <li><img src='http://placehold.it/500x200&text=Victor Vong' alt=''></li>
        </ul>

        <button id='again'>Again :-)</button>
    </div>
</div>

<script type="text/javascript">
    var slides = $('#slideshow').find('li');
    
    
    // move all to the right.
    slides.addClass('in');
    
    // move first one to current.
    $(slides[0]).removeClass().addClass('current');
    
    var currentIndex = 0;
    
    var minimumCount = 50;
    var maximumCount = 200;
    var count = 0;
    
    function nextSlide() {
        $('#again').attr('disabled','disabled');
        
        currentIndex += 1;
        if (currentIndex >= slides.length) {
            currentIndex = 0;
        }
        
        // move any previous 'out' slide to the right side.
        $('.out').removeClass().addClass('in');
        
        // move current to left.
        $('.current').removeClass().addClass('out');
        
        // move next one to current.
        $(slides[currentIndex]).removeClass().addClass('current');
        
        
        count += 1;
        if (count > maximumCount || (count > minimumCount && Math.random()>0.6) ) {
            clearInterval(interval);
            
            $('#again').removeAttr('disabled');
        }
    }
    
    var interval = setInterval(nextSlide, 120);

    $('#again').click(function(){
        count = 0;
        interval = setInterval(nextSlide, 120);
    });
</script>