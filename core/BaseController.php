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
     * @var BaseModel $model
     */
    protected BaseModel $model;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $this->app = new Application();
        $this->load = $this->app->load;
        $this->model = new BaseModel();
//        $this->db = $this->app->PDOx();
    }
}