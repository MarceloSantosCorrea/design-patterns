<?php

namespace DesignPatterns\Creational\FactoryMethod\Logger\Stdout;

use DesignPatterns\Creational\FactoryMethod\Logger\AbstractLoggerManager;
use Psr\Log\LoggerInterface;

class StdoutLogManagerAbstract extends AbstractLoggerManager
{
    protected function create(): LoggerInterface
    {
        return new StdoutLogWriter();
    }
}