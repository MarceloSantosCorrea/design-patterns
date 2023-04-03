<?php

namespace DesignPatterns\Creational\FactoryMethod\Logger;

use Psr\Log\LoggerInterface;

abstract class AbstractLoggerManager
{
    public function log(string $level, string $message, array $context = []): void
    {
        $writter = $this->createWritter();

        $date = date('d/m/Y');

        $formattedMessage = "[$date][$level]: $message";

        $writter->$level($formattedMessage, $context);
    }

    abstract protected function createWritter(): LoggerInterface;
}