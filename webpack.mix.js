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

/*
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
*/





/* auth */
/*mix.js('resources/mix/auth/app.js', 'public/js/auth')
    .sass('resources/mix/auth/app.scss', 'public/css/auth');*/
/* auth */
/* panel */
mix.sass('resources/mix/panel/app.scss', 'public/css/panel');
/* panel */
