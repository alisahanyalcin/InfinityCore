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

use InfinityCore\Core\BaseController;

class HomeController extends BaseController
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

##Database (PDO)
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

Example database configuration: `InfinityCore\core\BaseDatabase.php` for a shor time
```php
$this->db = new PDO('mysql:host=localhost;dbname=testDB', 'root', '');
```

**Usage:**
- To print all users names
```php
// e.g. http://localhost/InfinityCore/get-all-users (GET) - get all users
$router->get('/get-all-users', function() use($database)
{
    $users = $database->getAll("users");
    foreach($users as $user)
    {
        echo $user["name"] . "<br>";
    }
});
```
- To print all users names and emails
```php
// e.g. http://localhost/InfinityCore/get-all-users-and-emails (GET) - get all users and emails
$router->get('/get-all-users-and-emails', function() use($database)
{
    $users = $database->getAll("users");
    foreach($users as $user)
    {
        echo $user["name"] . " - " . $user["email"] . "<br>";
    }
});
```

- To print the name of the user whose id value is 1
```php
// e.g. http://localhost/InfinityCore/get-name/1 (GET) - get name of user with id 1
$router->get('/get-name/:int', function($value) use($database)
{
    echo $database->getOneByID("users", $value)["name"];
//    var_dump($database->getOneByID("users", $value));
});
```