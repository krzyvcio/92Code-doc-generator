const mix = require('laravel-mix');

mix.sass('resources/css/app.scss', 'public/css/app.css')
    .options({
        processCssUrls: false
    });