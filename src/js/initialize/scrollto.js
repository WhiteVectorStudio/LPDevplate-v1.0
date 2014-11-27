/*-------------------------------------------------------*\
						Scroll to
\*-------------------------------------------------------*/
;

// Home page: none

// Initialization
	$(document).ready(function() {
		/*
		 * Scoll top
		 */
			// Fade in scroll-up btn
			$(window).scroll(function(){
				if( $(this).scrollTop() > 200 ){
					$('.scroll-up').fadeIn();
				}else{
					$('.scroll-up').fadeOut();
				}
			});
			//Scroll to top
			$('.scroll-up').click(function(){
				$('body,html').animate({
					scrollTop:0
				},
				400
				);
				return false;
			});


		/*
		 * Scrolling by nav links
		 */
			// $('.header__nav-item, .main__down').click(function(){
			// 	var target = $(this).attr('href');
			// 	$('html, body').animate({
			// 		scrollTop: $(target).offset().top - 60
			// 	}, 500);
			// 	return false;
			// });
			// $('.header__nav-item').on('click', function() {
			// 	$('.header__nav-item').removeClass('active');
			// 	$(this).addClass('active');
			// });
	
		/*
		 * Nav elements change on scroll
		 */
			// $(".nav-anchors").waypoint(function(){
			// 	var menuLi = $('.header__nav li'),
			// 		conentBox = $(this).attr('id');

			// 	$.each(menuLi, function() {
			// 		var menuLink = $(this).children('a');
			// 		if(menuLink.attr('href').slice(1) == conentBox){
			// 			$('.header__nav-item').removeClass('active');
			// 			menuLink.addClass('active');
			// 		}
			// 	});
			// }, { offset: '20%' });

	}); //scroll to