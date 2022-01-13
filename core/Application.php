<?php

namespace InfinityCore\Core;
use InfinityCore\Core\{ModelBase, RouterBase, ViewBase};

class Application
{

    public function __construct()
    {
//        echo 'Application is running';
    }

    public function router(): RouterBase
    {
        return new RouterBase([
            'paths' => [
                'controllers' => 'application/controllers',
            ],
            'namespaces' => [
                'controllers' => 'InfinityCore\Application\controllers\\'
            ]
        ]);
    }

    public function model(): ModelBase
    {
        return new ModelBase();
    }

    public function view(): ViewBase
    {
        return new ViewBase();
    }
}