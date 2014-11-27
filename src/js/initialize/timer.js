/*-------------------------------------------------------*\
						Timer
\*-------------------------------------------------------*/
;

// Home page: http://flipclockjs.com/

// Required plugins
	require('../plugins/jquery.flipclock.js');

// Initialization
	$(document).ready(function() {
		var clock;
		clock = $('#clock1').FlipClock({
			clockFace: 'DailyCounter',
			autoStart: false,
			language: 'ru'
		});
		clock.setTime(3600*3);
		clock.setCountdown(true);
		clock.start();
	}); //timer