<?php

namespace InfinityCore\Core;

use PDO;

class BaseDatabase
{
    private PDO $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=infinitycore', 'root', '');
    }

    public function getDb(): PDO
    {
        return $this->db;
    }

    public function getAll($table): bool|array
    {
        $query = $this->db->query('SELECT * FROM '.$table);
        return $query->fetchAll();
    }

    public function getOne($table, $id)
    {
        $query = $this->db->query('SELECT * FROM '.$table.' WHERE id = '.$id);
        return $query->fetch();
    }

    public function getOneBy($table, $column, $value)
    {
        $query = $this->db->query('SELECT * FROM '.$table.' WHERE '.$column.' = "'.$value.'"');
        return $query->fetch();
    }

    public function getAllBy($table, $column, $value): bool|array
    {
        $query = $this->db->query('SELECT * FROM '.$table.' WHERE '.$column.' = "'.$value.'"');
        return $query->fetchAll();
    }

    public function getAllByOrder($table, $column, $value, $order): bool|array
    {
        $query = $this->db->query('SELECT * FROM '.$table.' WHERE '.$column.' = "'.$value.'" ORDER BY '.$order);
        return $query->fetchAll();
    }

    public function getAllByOrderBy($table, $column, $value, $order, $by): bool|array
    {
        $query = $this->db->query('SELECT * FROM '.$table.' WHERE '.$column.' = "'.$value.'" ORDER BY '.$order.' '.$by);
        return $query->fetchAll();
    }

    public function getAllByOrderByLimit($table, $column, $value, $order, $by, $limit): bool|array
    {
        $query = $this->db->query('SELECT * FROM '.$table.' WHERE '.$column.' = "'.$value.'" ORDER BY '.$order.' '.$by.' LIMIT '.$limit);
        return $query->fetchAll();
    }

    public function getAllByOrderByLimitOffset($table, $column, $value, $order, $by, $limit, $offset): bool|array
    {
        $query = $this->db->query('SELECT * FROM '.$table.' WHERE '.$column.' = "'.$value.'" ORDER BY '.$order.' '.$by.' LIMIT '.$limit.' OFFSET '.$offset);
        return $query->fetchAll();
    }
}