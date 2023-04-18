<?php

namespace DesignPatterns\Creational\FactoryMethod\Database;

interface DatabaseInterface
{
    public function select(string $query): array;
}