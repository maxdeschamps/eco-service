/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.min.css');

const $ = require('jquery');
global.$ = global.jQuery = $;
// require('bootstrap');

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');

$( document ).ready(function() {
  // bases
  require('./bases/global.js');

  // pages
  require('./pages/home.js');
  require('./pages/product.js');
  // require('./pages/product.js');
});
