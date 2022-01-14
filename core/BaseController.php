<?php

namespace InfinityCore\Core;

class BaseController
{
    protected Application $app;
    protected BaseView $view;
    protected PDOx\PDOx $PDOx;

    public function __construct()
    {
        $this->app = new Application();
        $this->view = $this->app->view();
        $this->PDOx = $this->app->PDOx();
    }
}