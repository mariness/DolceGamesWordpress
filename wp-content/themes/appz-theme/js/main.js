var Appz = {
	init: function(){
		this.hoverSlideAnimations();
		this.featuresHovers();
	},

	hoverSlideAnimations: function(){
		var $iphoneSlider = $('.iphone-slider').bxSlider({
			pager: false,
			slideWidth: 163,
			controls: false,
			touchEnabled: false
		});

		$('.features-slider').bxSlider({
			pager: false,
			slideWidth: 960,
			slideMargin: 0
		});

		var newestRequest = 0;
		var moveTo = function(index){
			newestRequest = index;

			var looper = setInterval(function(){
				if($iphoneSlider.getCurrentSlide() != index && newestRequest == index){
					$iphoneSlider.goToSlide(index);
				} else
					clearInterval(looper);
			}, 150);
		}

		// Chrome fix
		var $first_i_slide = $('.iphone-slider li').first();
		if($first_i_slide.hasClass('bx-clone'))
		 	$first_i_slide.remove();

		$('.features-slider-container li').on('mouseenter touchstart', function(event){
			var slideNumber = parseInt($(event.currentTarget).attr('data-screen'));

			moveTo(slideNumber);
		});
	},

	featuresHovers: function(){
		var $features = $('.features-slider-container li');

		$features.on('mouseenter touchstart', function(event){
			$features.removeClass('hover');
			$(event.currentTarget).addClass('hover');
		});
	}
};


$(document).ready(function(){
	Appz.init();
});
