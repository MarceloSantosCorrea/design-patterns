<?php

namespace DesignPatterns\Creational\FactoryMethod\Database\Factory;

use DesignPatterns\Creational\FactoryMethod\Database\DatabaseInterface;

interface DatabaseFactoryInterface
{
    public function create(): DatabaseInterface;
}