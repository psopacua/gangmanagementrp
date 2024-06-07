const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Styling
 |--------------------------------------------------------------------------
 */
mix.copy('themes/default/assets/css/bootstrap.min.css', 'public/themes/default/css');

mix.styles([
    'themes/default/assets/css/style.css',
    'themes/default/assets/css/responsive.css'
], 'public/themes/default/css/default.css');

/*
 |--------------------------------------------------------------------------
 | JavaScript
 |--------------------------------------------------------------------------
 */
mix.js('themes/default/assets/js/vue.js', 'themes/default/js');

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