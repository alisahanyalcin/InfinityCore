<?php

namespace InfinityCore\Core;
use InfinityCore\Core\{BaseRouter, BaseView, PDOx\PDOx};
use InfinityCore\Application\config\DBConfig;

class Application
{
    public BaseRouter $router;
    public BaseView $load;
    public BaseConfig $config;

    /**
     * Application constructor.
     */
    public function __construct()
    {
        $this->router = new BaseRouter();
        $this->load = new BaseView();
        $this->config = new BaseConfig();
    }

    /**
     * @return PDOx
     */
    public function PDOx(): PDOx
    {
        return new PDOx(DBConfig::dbConfig);
    }

    public function run()
    {
        $this->router->run();
    }
}