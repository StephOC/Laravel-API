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

mix
    .js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/assets/css')
    .options({
        processCssUrls: false
    })
    .browserSync({
        proxy: 'localhost:8000',
        logLevel: 'debug',
        logPrefix: "GDC-orion",
        files: [
            'public/assets/css/**/*.css',
            './resources/views/**/*.blade.php',
            './resources/sass/**/*.scss',
            './resources/js/**/*.js',
            './resources/js/**/*.vue'
        ],
        browser: ["chrome"]
    });

