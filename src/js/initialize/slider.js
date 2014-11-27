/*-------------------------------------------------------*\
						Slider
\*-------------------------------------------------------*/
;

// Home page: http://bxslider.com/

// Initialization
	$(document).ready(function() {
		$('#js-slider-1').bxSlider({
			pagerCustom: '#js-pager',
			controls: true,
			nextSelector: '#js-control-next',
			prevSelector: '#js-control-prev',
			nextText: ' ',
			prevText: ' '
		});
	});