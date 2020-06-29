<style type="text/css">
	.event-headline-component {
		display: flex;
		flex-direction: column;
		height: 100%;
		width: 100%;
		flex-flow: column;
		justify-content: space-between;
	}

	.event-headline-component h5 {
		font-size: 24px;
	}

	#btn-event-bg {
		color: white;
		background-color: #C5B358;
	}

	#btn-event-bgs {
		color: white;
		background-color: #c20000;
	}

	/* #btn-event-bg:hover{
		transform: scale(1.1);
	}
	#btn-event-bgs:hover{
		transform: scale(1.1);
	} */
	#clockdiv {
		font-family: sans-serif;
		color: #fff;
		display: inline-block;
		font-weight: 100;
		text-align: center;
		font-size: 30px;
	}

	#clockdiv>div {
		padding: 5px;
		/* border-radius: 50%;
		background: #00bf96; */
		display: inline-block;
	}

	#clockdiv>span {}

	#clockdiv div>span {
		padding: 18px;
		width: 60px;
		height: 60px;
		border-radius: 50%;
		background: #191a19;
		display: inline-block;
	}

	/* .smalltext {
		padding-top: 5px;
		font-size: 16px;
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
			<div id="clockdiv">
				<div>
					<span class="days"></span>
					<h6 class="text-dark">Days</h6>
				</div>
				<div>
					<span class="hours"></span>
					<h6 class="text-dark">Hours</h6>
				</div>
				<div>
					<span class="minutes"></span>
					<h6 class="text-dark">Mintes</h6>
				</div>
				<div>
					<span class="seconds"></span>
					<h6 class="text-dark">Seconds</h6>
				</div>
			</div>
			<p>Event Starts In</p>
		</div>
		<div style="display: flex; flex-direction: row; justify-content: space-between">
			<a href="{{ route('event.exhibitor_registration', $event->id) }}" class="btn btn-outline-gray ml-2"
				id="btn-event-bg">Join
				as Exhibitor</a>
			<a href="{{ route('cart', $event->name) }}?quantity=1" class="btn btn-outline-gray ml-2"
				id="btn-event-bgs">Join as
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
	// testing
	function getTimeRemaining(endtime) {
				var t = Date.parse(endtime) - Date.parse(new Date());
				var seconds = Math.floor((t / 1000) % 60);
				var minutes = Math.floor((t / 1000 / 60) % 60);
				var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
				var days = Math.floor(t / (1000 * 60 * 60 * 24));
				return {
					total: t,
					days: days,
					hours: hours,
					minutes: minutes,
					seconds: seconds,
				};
			}

			function initializeClock(id, endtime) {
				var clock = document.getElementById(id);
				var daysSpan = clock.querySelector(".days");
				var hoursSpan = clock.querySelector(".hours");
				var minutesSpan = clock.querySelector(".minutes");
				var secondsSpan = clock.querySelector(".seconds");

				function updateClock() {
					var t = getTimeRemaining(endtime);

					daysSpan.innerHTML = t.days;
					hoursSpan.innerHTML = ("0" + t.hours).slice(-2);
					minutesSpan.innerHTML = ("0" + t.minutes).slice(-2);
					secondsSpan.innerHTML = ("0" + t.seconds).slice(-2);

					if (t.total <= 0) {
						clearInterval(timeinterval);
					}
				}

				updateClock();
				var timeinterval = setInterval(updateClock, 1000);
			}

			var deadline = new Date(
				Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000
			);
			initializeClock("clockdiv", deadline);
</script>