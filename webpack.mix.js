const mix = require('laravel-mix')
var tailwindcss = require('tailwindcss')

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [tailwindcss('tailwind.config.js')]
    })
    .webpackConfig(require('./webpack.config'))
