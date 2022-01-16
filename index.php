<?php
// Valid PHP Version?
$minPHPVersion = '7.4';
if (version_compare(PHP_VERSION, $minPHPVersion, '<'))
{
    die("Your PHP version must be {$minPHPVersion} or higher to run CodeIgniter. Current version: " . PHP_VERSION);
}
unset($minPHPVersion);

require __DIR__ . '/vendor/autoload.php';
use InfinityCore\Core\Application;

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

const APPPATH = 'application';
const COREPATH = 'core';

$app = new Application();

$app->router->get('/', 'HomeController@index');
$app->router->get('/about', 'HomeController@about'); // return view about page with data from database PDOx class
$app->router->get('/test', 'HomeController@test'); //505 - Not Implemented

//e.g. test 404 - Not Found
$app->router->error(function () use ($app) {
    $app->load::view('errors/_404', [
        'statusCode' => '404',
        'messageTitle' => 'Page Not Found',
        'message' => 'Sorry, but the page you were trying to view does not exist.'
    ]);
});

$app->run(); // run the application