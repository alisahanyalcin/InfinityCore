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
        $records = $this->db->table('users')
            ->select('id, email, name')
            ->orderBy('id', 'asc')
            ->limit(20)
            ->getAll();
        $this->load->view('layout/header');
        $this->load->view('about', ['name' => 'About Page', 'records' => $records]);
        $this->load->view('layout/footer');
    }
}