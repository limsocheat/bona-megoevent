<style type="text/css">
	.event-headline-component {
		display: flex;
		flex-direction: column;
		height: 100%;
		width: 100%;
		flex-flow: column;
		justify-content: space-between;
	}
	.event-headline-component h5{
		font-size: 20px;
	}
	#btn-event-bg{
		color:white;
		background-color:#C5B358;
	}
	#btn-event-bgs{
		color:white;
		background-color:#c20000;
	}
	/* #btn-event-bg:hover{
		transform: scale(1.1);
	}
	#btn-event-bgs:hover{
		transform: scale(1.1);
	} */
</style>

<div class="event-headline-component">
	<div class="pb-3 px-3">
		<h5 class="font-weight-bold mt-3">{{ $event->name}}</h5>
		<span class="font-weight-bold">{{ $event->display_start_date }}</span>
	</div>
	<div class="pb-3 px-3">
		<p>{{$event->description}}</p>
	</div>
	<div class="px-3 pb-3">
		<div class="mb-5">
			<h4 id="demo">Countdown</h4>
			<p>Event Starts In</p>
		</div>
		<div style="display: flex; flex-direction: row; justify-content: space-between">
			<a href="{{ route('event.exhibitor_registration', $event->id) }}" class="btn btn-outline-gray ml-2" id="btn-event-bg">Join
				as Exhibitor</a>
			<a href="{{ route('cart', $event->id) }}?quantity=1" class="btn btn-outline-gray ml-2" id="btn-event-bgs">Join as
				Participants</a>
		</div>
	</div>
</div>
<script src="{{ asset('/plugins/countdown/jquery.countdown.js') }}" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	jQuery(document).ready(function($){
		// $('#counter').countdown({
        //   image: "<?php echo asset('/plugins/countdown/img/digits.png'); ?>",
        //   startTime: '01:12:12:00'
        // });

		// Set the date we're counting down to
		// var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();
		var countDownDate = new Date("<?php echo $event->start_date; ?> <?php echo $event->start_time; ?>").getTime();

		// Update the count down every 1 second
		var x = setInterval(function() {

		// Get today's date and time
		var now = new Date().getTime();
			
		// Find the distance between now and the count down date
		var distance = countDownDate - now;
			
		// Time calculations for days, hours, minutes and seconds
		var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = Math.floor((distance % (1000 * 60)) / 1000);
			
		// Output the result in an element with id="demo"
		document.getElementById("demo").innerHTML = days + "d " + hours + "h "
		+ minutes + "m " + seconds + "s ";
			
		// If the count down is over, write some text 
		if (distance < 0) {
			clearInterval(x);
			document.getElementById("demo").innerHTML = "EXPIRED";
		}
		}, 1000);
	});
</script>