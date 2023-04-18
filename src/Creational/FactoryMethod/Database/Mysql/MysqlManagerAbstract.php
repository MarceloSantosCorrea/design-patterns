<?php

namespace DesignPatterns\Creational\FactoryMethod\Database\Mysql;

use DesignPatterns\Creational\FactoryMethod\Database\AbstractDatabaseManager;
use DesignPatterns\Creational\FactoryMethod\Database\DatabaseManagerInterface;

class MysqlManagerAbstract extends AbstractDatabaseManager
{
    protected function create(): DatabaseManagerInterface
    {
        return new Mysql();
    }
}