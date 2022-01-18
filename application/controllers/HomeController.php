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
        $this->load->view('layout/header');
        $this->load->view('home', ['name' => 'InfinityCore']);
        $this->load::view('layout/footer');
    }

    public function about()
    {
        $records = $this->model->getModel('HomeModel')->getRecords();

        $this->load->view('layout/header');
        $this->load->view('about', ['name' => 'About Page', 'records' => $records]);
        $this->load->view('layout/footer');
    }
}