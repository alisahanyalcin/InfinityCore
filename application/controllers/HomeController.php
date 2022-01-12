<?php
namespace InfinityCore\Application\controllers;

use InfinityCore\Core\ControllerBase;

class HomeController extends ControllerBase
{
    public function __construct()
    {
        parent::viewLoad();
    }

    public function index()
    {
        $this->view->renderTwig('layout/header');
        $this->view->renderTwig('home', ['name' => 'InfinityCore']);
        $this->view::renderTwig('layout/footer');
    }
}