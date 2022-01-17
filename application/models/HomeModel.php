<?php

namespace InfinityCore\Application\models;

use InfinityCore\Core\BaseModel;

class HomeModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getRecords()
    {
        return $this->db->table('users')
            ->select('id, email, name')
            ->orderBy('id', 'asc')
            ->limit(20)
            ->getAll();
    }
}