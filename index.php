<?php

use DesignPatterns\Creational\FactoryMethod\Logger\Stdout\StdoutManagerAbstract;
use DesignPatterns\Creational\FactoryMethod\Database\Mysql\MysqlManagerAbstract;
use Psr\Log\LogLevel;

require __DIR__ . '/vendor/autoload.php';

$logManager = new StdoutManagerAbstract();
$logManager->log(LogLevel::DEBUG, 'Corrêa menagem de log', ['message' => true]);

$databaseManager = new MysqlManagerAbstract();
$result = $databaseManager->select('SELECT * FROM users');

PHP_EOL . print_r($result);
