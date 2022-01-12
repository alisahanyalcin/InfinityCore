<?php

namespace InfinityCore\Core\Router;

use InfinityCore\Core\ViewBase;

class RouterException
{
    /**
     * Create Exception Class.
     *
     * @param string $message
     * @param int    $statusCode
     *
     */
    public function __construct(string $message, int $statusCode = 500)
    {
        http_response_code($statusCode);
        $view = new ViewBase();
        $view->renderTwig('errors/_500', [
            'messageTitle' => "Opps! An error occurred.",
            'message' => $message,
            'statusCode' => $statusCode
        ]);
        die();
    }
}
