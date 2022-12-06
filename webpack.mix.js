const mix = require('laravel-mix');

require('vuetifyjs-mix-extension')

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

// mix.js('resources/js/app.js', 'public/js').vue()
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]).sourceMaps();

    // mix.js('resources/js/app.js', 'public/js').vuetify().vue()
//if you use vuetify-loader
mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    //
]).vuetify('vuetify-loader').vue().sourceMaps()