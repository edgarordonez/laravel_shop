let mix = require('laravel-mix').mix;
let BrowserSyncPlugin = require('browser-sync-webpack-plugin');
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
mix.webpackConfig({
    plugins: [
        new BrowserSyncPlugin({
            files: [
                'public_html/css/*.css',
                'resources/views/**/*.blade.php',
                'resources/assets/js/components/*.vue',
                'app/**/*.php'
            ],
            proxy: 'http://shop.app',
            logPrefix: "Laravel Eixir BrowserSync",
            logConnections: false,
            reloadOnRestart: false,
            notify: true,
            open: true
        })
    ]
}).setPublicPath('public_html')
    .js('resources/assets/js/app.js', 'js')
    .sass('resources/assets/sass/app.scss', 'css');
