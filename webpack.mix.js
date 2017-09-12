const mix = require('laravel-mix');

mix
  .setPublicPath('dist')
  .sass('assets/styles/main.scss', 'styles/main.css')
  .js('assets/scripts/main.js', 'scripts/main.js');
