<?php
/**
 * development
 * testing
 * production
 */
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
use InfinityCore\Core\BaseDatabase;

$app = new Application();
$view = $app->view();
$model = $app->model();
$router = $app->router();
$database = new BaseDatabase();

$router->get('/', 'HomeController@index');
$router->get('/test', 'HomeController@test'); //505 - Not Implemented
$router->get('/about', 'HomeController@about'); //505 - Not Implemented
$router->get('/get', function () use($database) {
    echo "email is; ".$database->getOne("users2", 1)['email'];
    echo "<br>";
    echo "name is; ".$database->getOne("users2", 1)['name'];
});

//e.g. test 404 - Not Found
$router->error(function () use ($view) {
    $view->renderTwig('errors/_404', [
        'statusCode' => '404',
        'messageTitle' => 'Page Not Found',
        'message' => 'Sorry, but the page you were trying to view does not exist.'
    ]);
});

$router->run(); // run the router