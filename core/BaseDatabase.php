<?php

namespace InfinityCore\Core;

use PDO;
use PDOException;
use InfinityCore\Core\Log;

//TODO: Add config variables for database connection.
class BaseDatabase
{
    // Database connection
    private PDO $db;
    protected Log $log;

    /**
     * BaseDatabase constructor.
     */
    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=testDB', 'root', '');
        }
        catch (PDOException $e) {
            $this->log = new Log();
            # Write into log
            echo $this->log->ExceptionLog($e->getMessage());
            die();
        }
    }

    public function getAll($table): bool|array
    {
        $query = $this->db->query('SELECT * FROM '.$table);
        return $query->fetchAll();
    }

    public function getOneByID($table, $id): bool|array
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

    public function getAllCount($table): int
    {
        $query = $this->db->query('SELECT COUNT(*) FROM '.$table);
        return $query->fetch()[0];
    }

    public function getAllCountBy($table, $column, $value): int
    {
        $query = $this->db->query('SELECT COUNT(*) FROM '.$table.' WHERE '.$column.' = "'.$value.'"');
        return $query->fetch()[0];
    }

    public function getAllCountByLike($table, $column, $value): int
    {
        $query = $this->db->query('SELECT COUNT(*) FROM '.$table.' WHERE '.$column.' LIKE "%'.$value.'%"');
        return $query->fetch()[0];
    }

    public function getAllCountByLikeStart($table, $column, $value): int
    {
        $query = $this->db->query('SELECT COUNT(*) FROM '.$table.' WHERE '.$column.' LIKE "'.$value.'%"');
        return $query->fetch()[0];
    }

    public function getAllCountByLikeEnd($table, $column, $value): int
    {
        $query = $this->db->query('SELECT COUNT(*) FROM '.$table.' WHERE '.$column.' LIKE "%'.$value.'"');
        return $query->fetch()[0];
    }
}