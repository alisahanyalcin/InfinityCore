<?php
namespace InfinityCore\Application\controllers;

use InfinityCore\Core\BaseController;

class HomeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->renderTwig('layout/header');
        $this->view->renderTwig('home', ['name' => 'InfinityCore']);
        $this->view::renderTwig('layout/footer');
    }

    public function about()
    {
        $records = $this->PDOx->table('users')
            ->select('id, email, name')
            ->orderBy('id', 'asc')
            ->limit(20)
            ->getAll();
        $this->view->renderTwig('layout/header');
        $this->view->renderTwig('about', ['name' => 'About Page', 'records' => $records]);
        $this->view->renderTwig('layout/footer');
    }
}