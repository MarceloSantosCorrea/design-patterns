<?php

namespace DesignPatterns\Creational\FactoryMethod\Logger\File;

use DesignPatterns\Creational\FactoryMethod\Logger\AbstractLoggerManager;
use Psr\Log\LoggerInterface;

class FileLogManagerAbstract extends AbstractLoggerManager
{
    public function __construct(private readonly string $path)
    {
    }

    protected function create(): LoggerInterface
    {
        return new FileLogWriter($this->path);
    }
}