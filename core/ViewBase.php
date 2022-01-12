<?php

namespace InfinityCore\Core;

use Exception;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class ViewBase
{
    /**
     * Render a view file
     *
     * @param string $view The view file
     * @param array $args Associative array of data to display in the view (optional)
     *
     * @return void
     * @throws Exception
     */
    public static function render(string $view, array $args = []): void
    {
        extract($args, EXTR_SKIP);

        $file = dirname(__DIR__) . "/application/views/$view".".php";

        if (is_readable($file))
            require $file;
        else
            throw new Exception("$file not found");
    }

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
    public static function renderTwig(string $template, array $args = [])
    {
//        static $twig = null;
//
//        if ($twig === null) {
//            $loader = new FilesystemLoader(dirname(__DIR__) . '/application/views');
//            $twig = new Environment($loader);
//        }
//
//        extract($args, EXTR_SKIP);
//        echo $twig->render($template);

        $loader = new FilesystemLoader(dirname(__DIR__) . '/application/views');
        $twig = new Environment($loader);
        echo $twig->render($template.".php", $args);
    }
}