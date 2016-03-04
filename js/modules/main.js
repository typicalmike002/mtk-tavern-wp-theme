define(function (require) {

	'use strict';

	var hamburger = require('./modules/hamburger');
	hamburger('mobile-icon','mobile-icon_hamburger','open');

	require('./modules/slider');
	require('./modules/lazyload');
});