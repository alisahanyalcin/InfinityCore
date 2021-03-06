# InfinityCore
InfinityCore is a PHP framework for building web applications.

## Installation
create project via composer:
```
composer create-project alisahanyalcin/infinity-core:dev-master app-name
cd app-name
```
or run the following command directly:
````
git clone https://github.com/alisahanyalcin/InfinityCore.git
cd InfinityCore
composer install
````

# Basic Usage

**You can found full documentation at [Wiki](https://github.com/alisahanyalcin/InfinityCore/wiki).**

## Config
`Application/config/AppConfig.php`
```php
const base_url = 'http://localhost/InfinityCore/';

// development, production, testing
const ENVIRONMENT = 'production';

const TIMEZONE = 'Europe/Istanbul';
```

`Application/config/DBConfig.php`
```php
const dbConfig = [
    'debug'     => true,
    'host'      => 'localhost',
    'driver'	=> 'mysql',
    'database'	=> 'testDB',
    'username'	=> 'root',
    'password'	=> '',
    'charset'	=> 'utf8',
    'collation'	=> 'utf8_general_ci',
    'prefix'	=> ''
];
```

## Application
```php
<?php
require __DIR__ . '/vendor/autoload.php';
use InfinityCore\Core\Application; // import the application class

$app = new Application(); // Create new application
*here you can add your routes*
$app->run(); // run the application
```

## Routing
Example Route Definition:
```php
$app->router->get('/', 'HomeController@index');
$app->router->get('/about', 'HomeController@about'); // return view about page with data from database PDOx class
```

## Errors
Example error: `index.php`
````php
use InfinityCore\Application\config\AppConfig;

//e.g. test 404 - Not Found
$app->router->error(function () use ($app) {
    $app->load::view('errors/'.AppConfig::pageNotFoundErrorView, [
        'statusCode' => '404',
        'messageTitle' => 'Page Not Found',
        'message' => 'Sorry, but the page you were trying to view does not exist.'
    ]);
});
````

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
        $this->load->view('home', ['name' => 'InfinityCore']);
    }

    public function about()
    {
        $records = $this->model->getModel('HomeModel')->getRecords();

        $this->load->view('about', ['name' => 'About Page', 'records' => $records]);
    }
}
```

## Views
`index.php`
````php
<h1>
    Welcome to{% if name %} {{name}} {% endif %}
</h1>
<p>
    {{name}} is a PHP framework for building web applications. // print name
</p>
````

`about.php`
````php
<h1>
    Welcome to
    {% if name %}
    {{name}}
    {% endif %}
</h1>
<p>
    {% for record in records %}
        <br> > {{record.name}}:{{record.email}}
    {% else %}
        No users have been found.
    {% endfor %}
</p>
````

## Database
Example database:
```sql
CREATE TABLE `testdb`.`users`
(
    `id` INT NOT NULL AUTO_INCREMENT ,
    `email` VARCHAR(256) NOT NULL ,
    `name` VARCHAR(256) NOT NULL ,
    PRIMARY KEY (`id`)
)   ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;
```