var elixir = require('laravel-elixir');
require('laravel-elixir-livereload');

var paths = {
    'bootstrap': './vendor/bower_components/bootstrap-sass/assets/'
};

var sassOptions = {
    includePaths: [paths.bootstrap + 'stylesheets/']
};

elixir(function (mix) {
    mix.sass('admin/app.scss', elixir.config.cssOutput + '/admin', sassOptions)
        .copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts')
        .babel(['common.js', 'admin/da.js', 'admin/app.js'], 'public/js/admin/app.js')
        .scripts(['admin/da.js'], 'public/js/admin/da.js');

    mix.livereload();
});
