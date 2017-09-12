const mix = require('laravel-mix');

mix
  .setPublicPath('dist')
  .sass('assets/styles/main.scss', 'dist/styles/main.css')
  .js('assets/scripts/main.js', 'dist/scripts/main.js');
