// JavaScript Document
var screen_height = $(window).height();
var screen_width = $(window).width();


	
	var scrollTop = $(window).scrollTop();
	if (scrollTop > 200)
			{
				$('.mainHeader').addClass('fixed-header');
			} else if (scrollTop < 200){
				$('.mainHeader').removeClass('fixed-header');
			}
		

	$(window).on('scroll', function () {
	var scrollTop = $(window).scrollTop();
		if (scrollTop > 200)
			{
				$('.mainHeader').addClass('fixed-header');
			} else if (scrollTop < 200){
				$('.mainHeader').removeClass('fixed-header');
			}
		});
