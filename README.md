# [Oxboot Theme](http://oxboot.com/)

Oxboot Starter Theme is a WordPress starter theme with a modern development workflow.

## Features

* Sass for stylesheets
* ES6 for JavaScript
* [Laravel Mix](https://github.com/JeffreyWay/laravel-mix) for compiling assets, concatenating and minifying files
* [Foundation 6](https://github.com/zurb/foundation-sites) for a front-end framework (can be removed or replaced)
* [Blade](https://laravel.com/docs/5.5/blade) and [Twig](http://twig.sensiolabs.org/) as a templating engines

## Requirements

Make sure all dependencies have been installed before moving on:

* [PHP](http://php.net/manual/en/install.php) >= 7.0.0
* [Composer](https://getcomposer.org/download/)
* [Node.js](http://nodejs.org/) >= 6.9.x

## Theme installation

Install Oxboot Theme using Composer from your WordPress themes directory (replace `your-theme-name` below with the name of your theme):

```shell
# @ app/themes/ or wp-content/themes/
$ composer create-project oxboot/theme your-theme-name dev-master
```

Navigate to the theme directory then run `npm install`:

```shell
# @ example.com/site/web/app/themes/your-theme-name
$ npm install
```

You now have all the necessary dependencies to run the build process.

### Build commands

* `npm run dev` — Compile assets and stop
* `npm run watch` — Compile and watch the files changes
* `npm run prod` — Compile assets for production

## Contributing

Contributions are welcome from everyone.

