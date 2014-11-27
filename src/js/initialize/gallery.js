/*-------------------------------------------------------*\
					Lightbox gallery
\*-------------------------------------------------------*/
;

// Home page: http://www.no-margin-for-errors.com

// Required plugins
	require('../plugins/jquery.prettyPhoto.js');

// Initialization
	$(document).ready(function() {
		$("a[rel^='prettyPhoto']").prettyPhoto({
			hideflash:true
		});
	}); //lightbox gallery