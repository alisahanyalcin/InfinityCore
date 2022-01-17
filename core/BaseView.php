<?php

namespace InfinityCore\Core;

use Exception;
use InfinityCore\Application\config\AppConfig;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class BaseView
{
    /**
     * Render a view template using Twig
     *
     * @param string $template  The template file
     * @param array $args  Associative array of data to display in the view (optional)
     *
     * @return void
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public static function view(string $template, array $args = [])
    {
        $loader = new FilesystemLoader(dirname(__DIR__) . '/'.AppConfig::APPPATH.'/'.AppConfig::VIEWPATH);
        $twig = new Environment($loader);
        echo $twig->render($template.".php", $args);
    }
}