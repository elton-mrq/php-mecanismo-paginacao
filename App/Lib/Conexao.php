<?php

namespace App\Lib;

use Exception;
use PDO;
use PDOException;

class Conexao
{
    private static $connection;

    public static function getConnection()
    {
        $pdoConfig = DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME;
        try {
            
            if(!isset(self::$connection)){
                self::$connection = new PDO($pdoConfig, DB_USER, DB_PASS);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }

            return self::$connection;

        } catch (PDOException $exc) {
            throw new Exception('Erro ao conectar com o banco de dados: ' . $exc->getMessage(), 404);
        }

    }
}