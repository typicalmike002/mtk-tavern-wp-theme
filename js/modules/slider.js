define(function (){

	$(document).ready(function(){
		
		// Removes the hidden class from the slider after bxslider is finished.
		// Note: this was done so the slider won't flash all the images at once.
		$('ul.bxslider').removeClass('ul.bxslider_hidden');
		
		// Sets up the options for the bxslider on the front-page.php template.
		$('.bxslider').bxSlider({
			mode: 'horizontal',
			thouchEnabled: true,
			controls: false,
			auto: true,
			pause: 3000,
			autoHover: true,
			infiniteLoop: true,
			captions: true
		});
		
	});
});