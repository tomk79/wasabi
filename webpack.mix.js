const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
	/**
	 * App Resources
	 */
	.js('resources/js/app.js', 'public/js')
	.sass('resources/sass/app.scss', 'public/css')

	/**
	 * px2style
	 */
	.copyDirectory('vendor/pickles2/px2style/dist', 'public/common/px2style/dist')
;
