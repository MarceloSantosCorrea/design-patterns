<?php

namespace DesignPatterns\Creational\FactoryMethod\Logger\StdoutLog;

use DesignPatterns\Creational\FactoryMethod\Logger\AbstractLoggerManager;
use Psr\Log\LoggerInterface;

class StdoutLogManagerAbstract extends AbstractLoggerManager
{
    protected function createWritter(): LoggerInterface
    {
        return new StdoutLogWritter();
    }
}