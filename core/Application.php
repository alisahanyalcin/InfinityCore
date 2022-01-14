<?php

namespace InfinityCore\Core;
use InfinityCore\Core\{BaseModel, BaseRouter, BaseView, PDOx\PDOx};

class Application
{
    //TODO: create a config class and implement a config values like log path, default time zone and database connection, etc.
    private array $config = [
        'host'		=> 'localhost',
        'driver'	=> 'mysql',
        'database'	=> 'testDB',
        'username'	=> 'root',
        'password'	=> '',
        'charset'	=> 'utf8',
        'collation'	=> 'utf8_general_ci',
        'prefix'	 => ''
    ];

    public function __construct()
    {
//        echo 'Application is running';
    }

    public function router(): BaseRouter
    {
        return new BaseRouter();
    }

    public function model(): BaseModel
    {
        return new BaseModel();
    }

    public function load(): BaseView
    {
        return new BaseView();
    }

    public function PDOx(): PDOx
    {
        return new PDOx($this->config);
    }
}