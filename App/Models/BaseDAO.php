<?php

namespace App\Models;
use App\Lib\Conexao;
use Exception;
use PDOException;

abstract class BaseDAO
{
    private $table;
    private $connection;

    public function __construct($table)
    {
        $this->table = $table;
        $this->connection = Conexao::getConnection();
    }

    public function execute($query, $params = [])
    {
        try {
            $smtp = $this->connection->prepare($query);
            $smtp->execute($params);
            return $smtp;
        } catch (PDOException $exc) {
            throw new Exception('Erro ao executar a query: ' . $exc->getMessage(), 404);
        }
    }

    public function select($where = null, $order = null, $limit = null, $fields = '*')
    {
        $where = strlen($where) ? " WHERE " . $where : "";
        $order = strlen($order) ? " ORDER BY " . $order : "";
        $limit = strlen($limit) ? " LIMIT " . $limit : "";

        $query = "SELECT {$fields} FROM {$this->table} {$where} {$order} {$limit}";

        return $this->execute($query);
    }
}