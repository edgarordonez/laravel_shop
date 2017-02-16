const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');
require('laravel-elixir-browsersync-official');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.sass('app.scss', 'public_html/css/')
        .webpack('app.js', 'public_html/js/')
        .browserSync({
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
        });
});
