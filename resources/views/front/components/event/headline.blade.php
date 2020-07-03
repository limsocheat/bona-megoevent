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
	#multi-line-truncate {
		display: -webkit-box;
		-webkit-box-orient: vertical;
		-webkit-line-clamp: 4;
		overflow: hidden;
	}
</style>

<div class="event-headline-component">
	<div class="px-3">
		<h5 class="font-weight-bold mt-3">{{ $event->name}}</h5>
		<span class="font-weight-bold">{{ $event->display_start_date }}</span>
	</div>
	<div class="px-3">
		<p id="multi-line-truncate">{{$event->description}}</p>
	</div>
	<div class="px-3 pb-3">
		<div class="mb-4">
			{{-- <h4 id="demo">Countdown</h4> --}}
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
					<h6 class="text-dark">Minutes</h6>
				</div>
				<div>
					<span class="seconds"></span>
					<h6 class="text-dark">Seconds</h6>
				</div>
			</div>
			{{-- <p class="m-0">Event Starts In</p> --}}
		</div>
		<div style="display: flex; flex-direction: row;">
			<a href="{{ route('event.exhibitor_registration', $event->name) }}" class="btn btn-outline-gray ml-2"
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
				Date.parse(new Date("<?php echo $event->start_date; ?> <?php echo $event->start_time; ?>"))
			);
			initializeClock("clockdiv", deadline);
</script>