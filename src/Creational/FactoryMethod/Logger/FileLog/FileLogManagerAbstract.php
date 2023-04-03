<?php

namespace DesignPatterns\Creational\FactoryMethod\Logger\FileLog;

use DesignPatterns\Creational\FactoryMethod\Logger\AbstractLoggerManager;
use Psr\Log\LoggerInterface;

class FileLogManagerAbstract extends AbstractLoggerManager
{
    public function __construct(private readonly string $path)
    {
    }

    protected function createWritter(): LoggerInterface
    {
        return new FileLogWritter($this->path);
    }
}