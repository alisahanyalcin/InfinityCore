<?php

namespace InfinityCore\Core;
use InfinityCore\Core\{BaseModel, BaseRouter, BaseView, PDOx\PDOx};

class Application
{
    public BaseRouter $router;
    public BaseView $load;
    public BaseModel $model;

    //TODO: create a config class and implement a config values like log path, default time zone and database connection, etc.
    private array $DBConfig = [
        'host'		=> 'localhost',
        'driver'	=> 'mysql',
        'database'	=> 'testDB',
        'username'	=> 'root',
        'password'	=> '',
        'charset'	=> 'utf8',
        'collation'	=> 'utf8_general_ci',
        'prefix'	 => ''
    ];

    /**
     * Application constructor.
     */
    public function __construct()
    {
        $this->router = new BaseRouter();
        $this->load = new BaseView();
        $this->model = new BaseModel();
    }

    /**
     * @return PDOx
     */
    public function PDOx(): PDOx
    {
        return new PDOx($this->DBConfig);
    }

    public function run()
    {
        $this->router->run();
    }
}