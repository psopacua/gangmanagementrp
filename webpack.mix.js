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

// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');

// mix.js('node_modules/video.js/dist/video.min.js', 'public/js')
//    .js('node_modules/videojs-youtube/dist/Youtube.js', 'public/js')
//    .js('node_modules/vue-video-player/dist/vue-video-player.js', 'public/js')
//    .sass('node_modules/video.js/src/css/video-js.scss', 'public/css');

// Theme: Default
mix.copy('themes/default/assets/css/bootstrap.min.css', 'public/themes/default/css');

mix.styles([
    'themes/default/assets/css/style.css',
    'themes/default/assets/css/responsive.css'
], 'public/themes/default/css/default.css');

mix.js('themes/default/assets/js/vue/app.js', 'themes/default/js/vue.js');

mix.copy('themes/default/assets/js/jquery-3.2.1.min.js',      'public/themes/default/js')
   .copy('themes/default/assets/js/jquery.sticky-kit.min.js', 'public/themes/default/js')
   .copy('themes/default/assets/js/custom.js',                'public/themes/default/js')
   .copy('themes/default/assets/js/bootstrap.min.js',         'public/themes/default/js')
   .copy('themes/default/assets/js/imagesloaded.pkgd.min.js', 'public/themes/default/js')
   .copy('themes/default/assets/js/grid-blog.min.js',         'public/themes/default/js');

mix.copyDirectory('themes/default/img', 'public/themes/default/img');

// Remove afterwards
mix.copyDirectory('themes/default/screenshots', 'public/themes/default/screenshots');
mix.copyDirectory('themes/default/demo_img',    'public/themes/default/demo_img');