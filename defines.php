<?php

/**
 * [en] Determine the directory separator
 * [ru] Определяем разделитель директорий
 */
define('DS', '/');

/**
 * [en] Determine the base theme directory
 * [ru] Определяем базовую папку темы
 */
define('BASE', str_replace(DIRECTORY_SEPARATOR, DS, __DIR__));

/**
 * [en] Determine the config, cache & views
 * [ru] Устанавливаем папки для настроек, кеша и шаблонов
 */
define('CONFIG', BASE.'/config');
define('CACHE', WP_CONTENT_DIR.'/cache');
define('VIEWS', BASE.'/views');
