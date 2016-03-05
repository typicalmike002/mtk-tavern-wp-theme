define(function (require) {

	'use strict';

	// Sets up Mobile Menu Icon.
	var hamburger = require('./modules/hamburger');
	hamburger('mobile-icon','mobile-icon_hamburger','open');

	// Loads external Library Settings.
	require('./modules/slider');
	require('./modules/lazyload');
});