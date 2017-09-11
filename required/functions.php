<?php

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

