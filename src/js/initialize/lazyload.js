/*-------------------------------------------------------*\
						Images lazyload
\*-------------------------------------------------------*/
;

// Home page: http://www.appelsiini.net/projects/lazyload

// Required plugins
	require('../plugins/jquery.lazyload.js');

// Initialization
	$(document).ready(function() {
		$(".lazy").lazyload({
			threshold : 500
		});
	}); //lazyload