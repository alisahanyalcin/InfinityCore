<?php

namespace InfinityCore\Core;
use InfinityCore\Core\{BaseModel, BaseRouter, BaseView};

class Application
{

    public function __construct()
    {
//        echo 'Application is running';
    }

    public function router(): BaseRouter
    {
        return new BaseRouter([
            'paths' => [
                'controllers' => 'application/controllers',
            ],
            'namespaces' => [
                'controllers' => 'InfinityCore\Application\controllers\\'
            ]
        ]);
    }

    public function model(): BaseModel
    {
        return new BaseModel();
    }

    public function view(): BaseView
    {
        return new BaseView();
    }
}