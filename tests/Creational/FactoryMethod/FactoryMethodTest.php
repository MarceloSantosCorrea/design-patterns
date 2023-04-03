<?php

namespace Creational\FactoryMethod;

use DesignPatterns\Creational\FactoryMethod\Logger\FileLog\FileLogManagerAbstract;
use DesignPatterns\Creational\FactoryMethod\Logger\StdoutLog\StdoutLogManagerAbstract;
use PHPUnit\Framework\TestCase;
use Psr\Log\LogLevel;

class FactoryMethodTest extends TestCase
{
    private string $pathfile;

    public function __construct(string $name)
    {
        parent::__construct($name);
        $this->pathfile = __DIR__ . '/log.log';
    }

    protected function setUp(): void
    {
        parent::setUp();

        if (file_exists($this->pathfile)) {
            unlink($this->pathfile);
        }
    }

    public function test_stdout_log_manager()
    {
        $expected = '[02/04/2023][debug]: Corrêa menagem de log';
        $this->expectOutputString($expected);
        $logManager = new StdoutLogManagerAbstract();
        $logManager->log(LogLevel::DEBUG, 'Corrêa menagem de log');
    }

    public function test_stdout_log_manager_context()
    {
        $expected = '[02/04/2023][debug]: Corrêa menagem de log Array
(
    [message] => 1
)';
        $this->expectOutputString($expected);
        $logManager = new StdoutLogManagerAbstract();
        $logManager->log(LogLevel::DEBUG, 'Corrêa menagem de log', ['message' => true]);
    }

    public function test_file_log_manager()
    {
        $logManager = new FileLogManagerAbstract($this->pathfile);
        $logManager->log(LogLevel::DEBUG, 'Corrêa menagem de log');

        $this->assertTrue(file_exists($this->pathfile));

        $expected = '[02/04/2023][debug]: Corrêa menagem de log';
        $this->assertEquals($expected, file_get_contents($this->pathfile));
    }

    public function test_file_log_manager_context()
    {
        $logManager = new FileLogManagerAbstract($this->pathfile);
        $logManager->log(LogLevel::DEBUG, 'Corrêa menagem de log', ['message' => true]);

        $this->assertTrue(file_exists($this->pathfile));

        $expected = '[02/04/2023][debug]: Corrêa menagem de log Array
(
    [message] => 1
)';
        $this->assertEquals($expected, file_get_contents($this->pathfile));
    }
}