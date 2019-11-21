const mix = require('laravel-mix');

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

// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'public/css/app.css',
    'public/css/blog.css'
], 'public/css/all.css');

mix.js('resources/js/add_comment_form.js', 'public/js');
mix.js('resources/js/create_article_form.js', 'public/js');
mix.js('resources/js/create_user_form.js', 'public/js');
mix.js('resources/js/edit_profile_form.js', 'public/js');
