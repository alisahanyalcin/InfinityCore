<?php

namespace InfinityCore\Core;

use PDO;
use PDOException;

//TODO: Add config variables for database connection.
class BaseDatabase
{
    // Database connection
    private PDO $db;

    /**
     * BaseDatabase constructor.
     */
    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=infinitycore', 'root', '');
        }
        catch (PDOException $e) {
            # Write into log
            echo $this->ExceptionLog($e->getMessage());
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

    //TODO: ExceptionLog function will be organized and developed soon. not for the use of the moment.
    /**
     * Writes the log and returns the exception
     *
     * @param string $message
     * @param string $sql
     *
     * @return string
     */
    private function ExceptionLog(string $message, string $sql = ""): string
    {
        $exception = 'Unhandled Exception. <br />';
        $exception .= $message;
        $exception .= "<br /> You can find the error back in the log.";

        if (!empty($sql)) {
            # Add the Raw SQL to the Log
            $message .= "\r\nRaw SQL : " . $sql;
        }
        # Write into log
        $this->log->write($message);

        return $exception;
    }
}