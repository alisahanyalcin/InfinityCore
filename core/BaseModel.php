<?php

namespace InfinityCore\Core;

class BaseModel
{
    /**
     * @var Application $app
     */
    protected Application $app;

    /**
     * @var PDOx\PDOx $db
     */
    protected PDOx\PDOx $db;

    /**
     * BaseModel constructor.
     */
    public function __construct()
    {
        $this->app = new Application();
        $this->db = $this->app->PDOx();
    }

    public function getModel($classname)
    {
        $class = '\InfinityCore\Application\models\\'.$classname;
        return (new $class);
    }
}