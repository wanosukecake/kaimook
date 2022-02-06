const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js([
        'resources/js/app.js',
        'resources/js/libraries/Chart.bundle.min.js',    
        'resources/js/libraries/popper.min.js',
        'resources/js/libraries/scripts.js',
        'resources/js/libraries/stisla.js',
        'resources/js/libraries/custom.js',
    ], 'public/js/app.js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]).vue();

if (mix.inProduction()) {
    mix.version();
   } else {
    mix.browserSync('localhost');
}