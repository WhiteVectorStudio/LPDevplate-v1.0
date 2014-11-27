/*-------------------------------------------------------*\
							Modal windows
\*-------------------------------------------------------*/
;

// Home page: http://dimsemenov.com/plugins/magnific-popup/

// Required plugins
	require('../plugins/jquery.magnific-popup.js');

// Initialization
	$(document).ready(function() {
		/**************************************
		 * MagnificPopup Initialize
		 */
			$('.popup').magnificPopup({
				type: 'inline',

				fixedContentPos: true,
				fixedBgPos: true,

				overflowY: 'auto',

				closeBtnInside: true,
				preloader: false,
				
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		/**************************************
		 * Changing modal window values
		 */
		 	var modalForm  = $('#modal'),
		 		subject    = $('#js-subject'),
				from       = $('#js-from');
		 	$('#js-header-btn').on('click', function() {
				subject.val('Заявка на обратный звонок ');
				from.val('Заказать звонок в шапке сайта ');
			});

	}); //popups