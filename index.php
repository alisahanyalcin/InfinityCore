<?php
require __DIR__ . '/vendor/autoload.php';

use InfinityCore\Core\Application;
use InfinityCore\Application\config\AppConfig;

$app = new Application();

$app->router->get('/', 'HomeController@index');
$app->router->get('/about', 'HomeController@about'); // return view about page with data from database PDOx class
$app->router->get('/test', 'HomeController@test'); //505 - Not Implemented

//e.g. test 404 - Not Found
$app->router->error(function () use ($app) {
    $app->load::view('errors/'.AppConfig::pageNotFoundErrorView, [
        'statusCode' => '404',
        'messageTitle' => 'Page Not Found',
        'message' => 'Sorry, but the page you were trying to view does not exist.'
    ]);
});

$app->run(); // run the application