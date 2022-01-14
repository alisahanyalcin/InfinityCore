<?php
const ENVIRONMENT = 'development';
switch (ENVIRONMENT)
{
    case 'development':
        error_reporting(-1);
        ini_set('display_errors', 1);
        break;
    case 'testing':
    case 'production':
        ini_set('display_errors', 0);
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
        break;
    default:
        header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
        echo 'The application environment is not set correctly.';
        exit(1); // EXIT_ERROR
}

require __DIR__ . '/vendor/autoload.php';
use InfinityCore\Core\Application;

$app = new Application();
$view = $app->load();
$model = $app->model();
$router = $app->router();

$router->get('/', 'HomeController@index');
$router->get('/about', 'HomeController@about'); // return view about page with data from database PDOx class
$router->get('/test', 'HomeController@test'); //505 - Not Implemented

//e.g. test 404 - Not Found
$router->error(function () use ($view) {
    $view->view('errors/_404', [
        'statusCode' => '404',
        'messageTitle' => 'Page Not Found',
        'message' => 'Sorry, but the page you were trying to view does not exist.'
    ]);
});

$router->run(); // run the router