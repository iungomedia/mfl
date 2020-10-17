const mix = require("laravel-mix");

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
mix
  .sass("resources/sass/app.scss", "public/css")
  .sass("resources/assets/sass/mflStyles.scss", "public/css")
  .scripts(
    [
      "resources/assets/js/*.js",
      "resources/assets/js/menu/*.js",
      "resources/assets/js/home/*.js",
      "resources/assets/js/result/*.js",
      "resources/assets/js/calendar/*.js",
      "resources/assets/js/contact/*.js",
      "resources/assets/js/cheerleader/*.js",
    ],
    "public/js/all.js"
  )
  .version();

mix.copyDirectory("resources/assets/fonts", "public/css/fonts");
