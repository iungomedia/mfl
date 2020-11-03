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
  .setPublicPath("./public/")
  .sass("resources/sass/app.scss", "public/css")
  .sass("resources/assets/sass/mflStyles.scss", "public/css")
  .js("resources/js/app.js", "public/js/app.js")
  .scripts(
    [
      "resources/assets/js/tools/helpers.js",
      "resources/assets/js/tools/modernizr.js",
      "node_modules/jquery/dist/jquery.js",
      "resources/assets/js/tools/classie.js",
      "node_modules/flexslider/jquery.flexslider.js",
      "resources/assets/js/tools/superdlider.js",
      "node_modules/mixitup/dist/mixitup.js",
      "node_modules/owl.carousel/dist/owl.carousel.js",
      "node_modules/glightbox/dist/js/glightbox.js",
      "node_modules/hammerjs/hammer.js",
      "resources/assets/js/menu/menu.js",
      "resources/assets/js/home/home.js",
      "resources/assets/js/result/result.js",
      "resources/assets/js/calendar/calendar.js",
      "resources/assets/js/contact/contact.js",
      "resources/assets/js/cheerleader/cheerleader.js"
    ],
    "public/js/all.js"
  )
  .version();

mix.copyDirectory("resources/assets/fonts", "public/css/fonts");
