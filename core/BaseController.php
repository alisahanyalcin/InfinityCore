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
    protected BaseView $view;
    /**
     * @var PDOx\PDOx $PDOx
     */
    protected PDOx\PDOx $PDOx;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $this->app = new Application();
        $this->view = $this->app->view();
        $this->PDOx = $this->app->PDOx();
    }
}