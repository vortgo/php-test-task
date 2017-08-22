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

mix.js(
    [
        'node_modules/laravel-echo/dist/echo.js',
        'resources/assets/js/custom.js'
    ], 'public/js/all.js')
    .styles(
        [
            'node_modules/bootstrap/dist/css/bootstrap.min.css',
            'resources/assets/custom.css'
        ], 'public/css/all.css'
    ).version();
