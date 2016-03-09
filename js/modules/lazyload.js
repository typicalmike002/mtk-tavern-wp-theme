define(function() {

	// Adds Lazy Loading to pages that have alot of pictures.
	$('div.lazy').lazyload({
		threshold: 200
	});
});