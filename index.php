<?php

use DesignPatterns\Creational\FactoryMethod\Logger\StdoutLog\StdoutLogManagerAbstract;
use Psr\Log\LogLevel;

require __DIR__ . '/vendor/autoload.php';

$logManager = new StdoutLogManagerAbstract();
$logManager->log(LogLevel::DEBUG, 'Corrêa menagem de log', ['message' => true]);
