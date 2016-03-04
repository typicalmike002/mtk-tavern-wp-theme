/**
 * Requirejs uses this config.js file to launch our app with the 
 * dependencies listed inside the 'Gruntfile.js' file.  You may 
 * have to include each dependency in this file as well so they
 * can be used by our apps modules.
 */

requirejs.config({

	baseUrl: dir.path
});

requirejs(['require', 'jquery', 'lazyload', 'bxslider', 'main']);