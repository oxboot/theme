<?php

namespace Oxboot\Theme;

use Brain\Hierarchy\Hierarchy;
use duncan3dc\Laravel\BladeInstance;
use Twig_Loader_Filesystem;
use Twig_Environment;

class View
{
    public function __construct($config)
    {
        add_action('template_redirect', function () use ($config) {
            $templates = (new Hierarchy())->getTemplates();
            $template_engines = $config['view']['template_engines'];
            foreach ($templates as $template) {
                foreach ($template_engines as $template_engine => $template_extension) {
                    $path = OX_THEME_VIEWS."/{$template}{$template_extension}";
                    if (file_exists($path)) {
                        switch ($template_engine) {
                            case 'Blade':
                                $blade = new BladeInstance(OX_THEME_VIEWS, OX_THEME_CACHE.'/blade');
                                echo $blade->render($template);
                                break;
                            case 'Twig':
                                $loader = new Twig_Loader_Filesystem(OX_THEME_VIEWS);
                                $twig = new Twig_Environment($loader, ['cache' => OX_THEME_CACHE.'/twig']);
                                echo $twig->render($template.$template_extension);
                                break;
                            default:
                                require $path;
                        }
                        exit;
                    }
                }
            }
        });
    }
}
