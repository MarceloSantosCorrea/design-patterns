<?php

namespace DesignPatterns\Creational\FactoryMethod\Database;

abstract class AbstractDatabaseManager
{
    public function select(string $query): array
    {
        $manager = $this->create();

        return $manager->select($query);
    }

    abstract protected function create(): DatabaseManagerInterface;
}