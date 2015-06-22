var elixir = require('laravel-elixir');
require('laravel-elixir-livereload');

var paths = {
    'bootstrap': './vendor/bower_components/bootstrap-sass/assets/'
};

var sassOptions = {
    includePaths: [paths.bootstrap + 'stylesheets/']
};

elixir(function (mix) {
    mix.sass('admin/app.scss', 'public/css/admin', sassOptions)
        .sass('admin/typography.scss', 'public/css/admin/typography.css', sassOptions)
        .babel(['common.js', 'admin/app.js'], 'public/js/admin/app.js')
        .scripts(['admin/da.js'], 'public/js/admin/da.js');

    mix.livereload();
});
