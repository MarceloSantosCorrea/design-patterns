<?php

namespace DesignPatterns\Creational\FactoryMethod\Database\Mysql;

use DesignPatterns\Creational\FactoryMethod\Database\DatabaseManagerInterface;
use PDO;

class Mysql implements DatabaseManagerInterface
{
    private PDO $connection;

    public function __construct()
    {
        try {
            $dsn = 'mysql:host=127.0.0.1;dbname=dpgof';
            $this->connection = new \PDO($dsn, 'dpgof', 'dpgof');
        } catch (\PDOException $e) {
            echo $e->getMessage();
            die;
        }
    }

    public function select(string $query): array
    {
        $statement = $this->connection->query($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}