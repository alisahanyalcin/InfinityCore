# InfinityCore
InfinityCore is a PHP framework for building web applications.

## Installation
create project via composer:
```
composer create-project alisahanyalcin/infinity-core:dev-master
```
or run the following command directly:
````
git clone https://github.com/alisahanyalcin/InfinityCore.git
cd InfinityCore
composer install
````

##Application
```php
use InfinityCore\Core\Application; // import the application class

$app = new Application(); // Create new application

$app->run(); // run the application
```


## Routing
Example Route Definition:
```php
$app->router->get('/', 'HomeController@index');
$app->router->get('/about', 'HomeController@about'); // return view about page with data from database PDOx class
```

## Controllers
```php
<?php

namespace InfinityCore\Application\controllers;

use InfinityCore\Core\BaseController;

class HomeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('home', ['name' => 'InfinityCore']);
        $this->load::view('layout/footer');
    }

    public function about()
    {
        $records = $this->model->getModel('HomeModel')->getRecords();

        $this->load->view('layout/header');
        $this->load->view('about', ['name' => 'About Page', 'records' => $records]);
        $this->load->view('layout/footer');
    }
}
```

## Views (Twig)
````php
<h1>
    Welcome to{% if name %} {{name}} {% endif %} // if name is set, print it, otherwise print nothing
</h1>
<p>
    {{name}} is a PHP framework for building web applications. // print name
</p>
````
Result is:
````html
<h1>
    Welcome to InfinityCore
</h1>
<p>
    InfinityCore is a PHP framework for building web applications.
</p>
````

## Errors (Twig)
Example error: `index.php`
````php
//e.g. test 404 - Not Found
$app->router->error(function () use ($app) {
    $app->load::view('errors/'.AppConfig::pageNotFoundErrorView, [
        'statusCode' => '404',
        'messageTitle' => 'Page Not Found',
        'message' => 'Sorry, but the page you were trying to view does not exist.'
    ]);
});
````

## Database (PDOx)
Example database:
```sql
CREATE TABLE `testdb`.`users`
(
    `id` INT NOT NULL AUTO_INCREMENT ,
    `email` VARCHAR(256) NOT NULL ,
    `name` VARCHAR(256) NOT NULL ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;
```