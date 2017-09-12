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
define('OX_THEME_ROOT', str_replace(DIRECTORY_SEPARATOR, DS, __DIR__));

/**
 * [en] Determine the config, cache & views
 * [ru] Устанавливаем папки для настроек, кеша и шаблонов
 */
define('OX_THEME_CONFIG', OX_THEME_ROOT.'/config');
define('OX_THEME_CACHE', WP_CONTENT_DIR.'/cache');
define('OX_THEME_VIEWS', OX_THEME_ROOT.'/views');

/**
 * [en] Composer auto-loader check
 * [ru] Проверяем наличие загрузчика Composer
 */
if (!file_exists($composer = OX_THEME_ROOT.'/vendor/autoload.php')) {
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
    'view' => require OX_THEME_ROOT.'/config/view.php'
];

new Setup($config);
new View($config);
