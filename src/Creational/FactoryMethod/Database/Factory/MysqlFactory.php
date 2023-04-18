<?php

namespace DesignPatterns\Creational\FactoryMethod\Database\Factory;

use DesignPatterns\Creational\FactoryMethod\Database\DatabaseInterface;
use DesignPatterns\Creational\FactoryMethod\Database\Mysql;

class MysqlFactory implements DatabaseFactoryInterface
{
    public function create(): DatabaseInterface
    {
        return new Mysql();
    }
}