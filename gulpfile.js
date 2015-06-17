var elixir = require('laravel-elixir');

var paths = {
    'bootstrap': './vendor/bower_components/bootstrap-sass/assets/',
    'jquery': './vendor/bower_components/jquery/dist/'
};

elixir(function (mix) {
    mix.sass('admin/admin.scss',
        elixir.config.cssOutput + '/admin',
        {includePaths: [paths.bootstrap + 'stylesheets/']})
        .copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts')
        .scripts([
            paths.jquery + 'jquery.js',
            paths.bootstrap + 'javascripts/bootstrap.js'
        ], 'public/js/app.js', './');
});
