var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');

    // Semantic
    mix.copy('semantic/dist/semantic.min.js', 'public/js/semantic.min.js');
    mix.copy('semantic/dist/semantic.min.css', 'public/css/semantic.min.css');
    mix.copy('semantic/dist/themes/default/assets/fonts', 'public/css/themes/default/assets/fonts');
});
