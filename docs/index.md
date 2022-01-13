# InfinityCore
InfinityCore is a PHP framework for building web applications.

## Routing
Example routing configuration:
```php
$router = new RouterBase([
    'paths' => [
        'controllers' => 'application/controllers',
    ],
    'namespaces' => [
        'controllers' => 'InfinityCore\Application\Controllers\\'
    ]
]);
```
<br>
Example Route Definition:

(e.g. controller is: `application/controllers/HomeController@index`)
```php
$router->get('/', 'HomeController@index');
$router->run(); // run the router
```

## Controllers (Twig)
Example Controller: `application/controllers/HomeController@about`
```php
<?php
namespace InfinityCore\Application\controllers;

use InfinityCore\Core\ControllerBase;

class HomeController extends ControllerBase
{
    public function __construct()
    {
        parent::viewLoad();
    }

    public function index()
    {
        $this->view->renderTwig('layout/header');
        $this->view->renderTwig('about', ['name' => 'About Page']);
        $this->view::renderTwig('layout/footer');
    }
}
```

## Views (Twig)
Example view: `application/views/about.php`

````php
<h1>
    {{name}} // name is passed from controller
</h1>
````
Result is:
````html
<h1>
    About Page
</h1>
````

## Errors (Twig)
Example error: `index.php`
````php
//e.g. test 404 - Not Found
$router->error(function () use ($view) {
    $view->renderTwig('errors/_404', [
        'statusCode' => '404',
        'messageTitle' => 'Page Not Found',
        'message' => 'Sorry, but the page you were trying to view does not exist.'
    ]);
});
````
