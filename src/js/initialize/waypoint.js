/*-------------------------------------------------------*\
					Waypoint animation
\*-------------------------------------------------------*/
;

// Home page: http://imakewebthings.com/jquery-waypoints/

// Required plugins
	require('../plugins/jquery.waypoints.js');

// Initialization
	$(document).ready(function() {
		$(".js-benefits__item").waypoint(function(direction){
			if(direction === 'down'){
				$(this).addClass('fadeInUp');
			}
			if(direction === 'up'){
				$(this).removeClass('fadeInUp');
			}
		}, { offset: "90%" });

		$(".js-products__item").waypoint(function(direction){
			if(direction === 'down'){
				$(this)
					.removeClass('fadeOut')
					.addClass('fadeIn');
			}
			if(direction === 'up'){
				$(this)
					.removeClass('fadeIn')
					.addClass('fadeOut');
			}
		}, { offset: "70%" });
	}); //waypoints