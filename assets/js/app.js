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

import noUiSlider from 'nouislider'
import 'nouislider/distribute/nouislider.css'

const slider = document.getElementById('price-slider');

if (slider) {
  const min = document.getElementById('min')
  const max = document.getElementById('max')
  const minValue = Math.floor(parseInt(slider.dataset.min, 10) / 10) * 10
  const maxValue = Math.ceil(parseInt(slider.dataset.max, 10) / 10) * 10
  const range = noUiSlider.create(slider, {
      start: [min.value || minValue, max.value || maxValue],
      connect: true,
      step: 10,
      range: {
          'min': minValue,
          'max': maxValue
      }
  })
  range.on('slide', function (values, handle) {
    if(handle === 0) {
      min.value = Math.round(values[0])
    }
    if(handle === 1) {
      max.value = Math.round(values[1])
    }
  })
}
