<?php

namespace Creational\FactoryMethod\Logger;

use DesignPatterns\Creational\FactoryMethod\Logger\File\FileManagerAbstract;
use DesignPatterns\Creational\FactoryMethod\Logger\Stdout\StdoutManagerAbstract;
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

    public function test_stdout_manager()
    {
        $expected = '[' . date('d/m/Y') . '][debug]: Corrêa menagem de log';
        $this->expectOutputString($expected);
        $logManager = new StdoutManagerAbstract();
        $logManager->log(LogLevel::DEBUG, 'Corrêa menagem de log');
    }

    public function test_stdout_manager_context()
    {
        $expected = '[' . date('d/m/Y') . '][debug]: Corrêa menagem de log Array
(
    [message] => 1
)';
        $this->expectOutputString($expected);
        $logManager = new StdoutManagerAbstract();
        $logManager->log(LogLevel::DEBUG, 'Corrêa menagem de log', ['message' => true]);
    }

    public function test_file_manager()
    {
        $logManager = new FileManagerAbstract($this->pathfile);
        $logManager->log(LogLevel::DEBUG, 'Corrêa menagem de log');

        $this->assertTrue(file_exists($this->pathfile));

        $expected = '[' . date('d/m/Y') . '][debug]: Corrêa menagem de log';
        $this->assertEquals($expected, file_get_contents($this->pathfile));
    }

    public function test_file_manager_context()
    {
        $logManager = new FileManagerAbstract($this->pathfile);
        $logManager->log(LogLevel::DEBUG, 'Corrêa menagem de log', ['message' => true]);

        $this->assertTrue(file_exists($this->pathfile));

        $expected = '[' . date('d/m/Y') . '][debug]: Corrêa menagem de log Array
(
    [message] => 1
)';
        $this->assertEquals($expected, file_get_contents($this->pathfile));
    }
}