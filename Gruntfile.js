module.exports = function(grunt) {

	//Loads all grunt tasks matching the ['grunt-*', '@*/grunt-*'] patterns.
	require('load-grunt-tasks')(grunt);

	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),

		watch: {
			options: {
				livereload: true,
			},
			config: {
				files: ['package.json', 'Gruntfile.js'],
				tasks: ['jshint', 'gitadd']
			},
			scss: {
				files: ['css/sass/*.scss', 'css/sass/**/*.scss'],
				tasks: ['compass', 'autoprefixer', 'combine_mq', 'cssmin', 'gitadd'],
				options: {
					spawn: false
				}
			},
			scripts: {
				files: ['js/config.js', 'js/modules/**/*.js'],
				tasks: ['jshint', 'requirejs', 'gitadd'],
				options: {
					spawn: false
				}
			},
			images: {
				files: ['images/**/*.{png,jpg,gif}'],
				tasks: ['gitadd']
			},
			src: {
				files: ['**/*.php','screenshot.png'],
				tasks: ['gitadd']
			}
		},

		gitadd: {
			task: {
				options: {
					all: true,
					force: true
				},
				files: {
					src: [
					'*.{php,png,css,rb,json,js}',
					'js/**/*.{js,htc}',
					'css/*.css',
					'css/sass/**/*.{scss,sass}',
					'page_templates/*.php',
					'images/*.{png,jpg,gif}'
					]
				}
			}
		},

		compass: {
			dist: {
				options: {
					config: 'config.rb',
					sassDir: 'css/sass',
					cssDir: 'css',
					environment: 'development'
				}
			}
		},

		combine_mq: {
			options: {
				beautify: true
			},
			main: {
				src: 'css/style.css',
				dest: 'css/style.css'
			}
		},

		autoprefixer: {
			options: {
				browsers: ['last 10 versions', 'ie 6', 'ie 7', 'ie 8', 'ie 9', '> 0%']
			},
			main: {
				expand: true,
				flatten: true,
				src: 'css/style.css',
				dest: 'css/'
			}
		},

		cssmin: {
			target: {
				files: [{
					'style.css': ['css/style.css']
				}]
			}
		},

		jshint: {
			all: ['Gruntfile.js', 'js/config.js', 'js/modules/*.js']
		},

		requirejs: {
			compile: {
				options: {
					baseUrl: 'js',
					name: 'config',
					optimize: 'uglify',
					paths: {
						main: 'modules/main',
						jquery: 'bower_components/jquery-2.2.1.min/index',
						lazyload: 'bower_components/jquery_lazyload/jquery.lazyload',
						bxslider: 'bower_components/bxslider-4/dist/jquery.bxslider.min',
						lightbox: 'bower_components/lightbox2/dist/js/lightbox.min'
					},
					out: 'js/optimize.min.js'
				}
			}
		}
	});
	grunt.registerTask('default', [
		'grunt-contrib-grunt-git',
		'grunt-autoprefixer',
		'grunt-contrib-cssmin',
		'grunt-contrib-combine-mq',
		'grunt-contrib-compass',
		'grunt-contrib-jshint',
		'grunt-contrib-requirejs'
	]);
};
