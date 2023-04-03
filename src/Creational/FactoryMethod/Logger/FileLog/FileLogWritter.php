<?php

namespace DesignPatterns\Creational\FactoryMethod\Logger\FileLog;

use Psr\Log\LoggerInterface;

class FileLogWritter implements LoggerInterface
{
    private $file;

    public function __construct(string $pathFile)
    {
        $this->file = fopen($pathFile, 'a+');
    }

    public function emergency(\Stringable|string $message, array $context = []): void
    {
        // TODO: Implement emergency() method.
    }

    public function alert(\Stringable|string $message, array $context = []): void
    {
        // TODO: Implement alert() method.
    }

    public function critical(\Stringable|string $message, array $context = []): void
    {
        // TODO: Implement critical() method.
    }

    public function error(\Stringable|string $message, array $context = []): void
    {
        // TODO: Implement error() method.
    }

    public function warning(\Stringable|string $message, array $context = []): void
    {
        // TODO: Implement warning() method.
    }

    public function notice(\Stringable|string $message, array $context = []): void
    {
        // TODO: Implement notice() method.
    }

    public function info(\Stringable|string $message, array $context = []): void
    {
        // TODO: Implement info() method.
    }

    public function debug(\Stringable|string $message, array $context = []): void
    {
        $output = $message;
        if (!empty($context)) {
            $output .= ' ' . print_r($context, true);
        }

        fwrite($this->file, trim($output));
    }

    public function log($level, \Stringable|string $message, array $context = []): void
    {
        // TODO: Implement log() method.
    }

    public function __destruct()
    {
        fclose($this->file);
    }
}