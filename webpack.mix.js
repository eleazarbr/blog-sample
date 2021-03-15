const mix = require('laravel-mix')
var tailwindcss = require('tailwindcss')

mix.webpackConfig({
    resolve: {
        extensions: ['.vue'],
        alias: {
            '@': __dirname + '/resources/js'
        }
    }
})

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [tailwindcss('tailwind.config.js')]
    })
