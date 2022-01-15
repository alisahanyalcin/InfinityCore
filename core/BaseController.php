<?php

namespace InfinityCore\Core;

class BaseController
{
    /**
     * @var Application $app
     */
    protected Application $app;

    /**
     * @var BaseView $view
     */
    protected BaseView $load;

    /**
     * @var PDOx\PDOx $db
     */
    protected PDOx\PDOx $db;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $this->app = new Application();
        $this->load = $this->app->load();
        $this->db = $this->app->PDOx();
    }
}