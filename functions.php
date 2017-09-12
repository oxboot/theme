<?php

namespace Oxboot\Theme;

/**
 * [en] PHP version check
 * [ru] Проверяем версию PHP
 */
if (version_compare('7.0.0', phpversion(), '>=')) {
    wp_die(
        'You must be using PHP 7.0.0 or greater.',
        'Invalid PHP version'
    );
}

/**
 * [en] Wordpress version check
 * [ru] Проверяем версию Wordpress
 */
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
    wp_die(
        'You must be using WordPress 4.7.0 or greater.',
        'Invalid WordPress version'
    );
}

/**
 * [en] Determine the directory separator
 * [ru] Определяем разделитель директорий
 */
define('DS', '/');

/**
 * [en] Determine the base theme directory
 * [ru] Определяем базовую папку темы
 */
define('THEME', str_replace(DIRECTORY_SEPARATOR, DS, __DIR__));

/**
 * [en] Determine the config, cache & views
 * [ru] Устанавливаем папки для настроек, кеша и шаблонов
 */
define('CONFIG', THEME.'/config');
define('CACHE', WP_CONTENT_DIR.'/cache');
define('VIEWS', THEME.'/views');

/**
 * [en] Composer auto-loader check
 * [ru] Проверяем наличие загрузчика Composer
 */
if (!file_exists($composer = THEME.'/vendor/autoload.php')) {
    wp_die(
        'You must run <code>composer install</code> from the Oxboot theme directory.',
        'Autoloader not found.'
    );
}

/**
 * [en] Register the auto-loader
 * [ru] Подключаем зависимости Composer
 */
require $composer;

$config = [
    'view' => require THEME.'/config/view.php'
];

new Setup($config);
new Template($config);
