<?php

namespace DesignPatterns\Creational\FactoryMethod\Database;

interface DatabaseManagerInterface
{
    public function select(string $query): array;
}