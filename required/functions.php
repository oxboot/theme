<?php

require __DIR__.'/../defines.php';

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
 * [en] Composer auto-loader check
 * [ru] Проверяем наличие загрузчика Composer
 */
if (!file_exists($composer = __DIR__.'/../vendor/autoload.php')) {
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
    'view' => require CONFIG.'/view.php',
];

add_action('template_redirect', function () use ($config) {
    $templates = (new Brain\Hierarchy\Hierarchy())->getTemplates();
    $template_engines = $config['view']['template_engines'];
    foreach ($templates as $template) {
        foreach ($template_engines as $template_engine => $template_extension) {
            $path = VIEWS."/{$template}{$template_extension}";
            if (file_exists($path)) {
                switch ($template_engine) {
                    case 'Blade':
                        $blade = new \duncan3dc\Laravel\BladeInstance(VIEWS, CACHE.'/blade');
                        echo $blade->render($template);
                        break;
                    case 'Twig':
                        $loader = new Twig_Loader_Filesystem(VIEWS);
                        $twig = new Twig_Environment($loader, ['cache' => CACHE.'/twig']);
                        echo $twig->render($template.$template_extension);
                        break;
                    case 'PHP':
                        require $path;
                }
                exit;
            }
        }
    }
});
