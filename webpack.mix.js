let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
mix.js('resources/assets/js/post/create.js', 'public/js/post/create.js');
mix.js('resources/assets/js/post/edit.js', 'public/js/post/edit.js');
mix.sass('resources/assets/sass/modules.scss', 'public/css');