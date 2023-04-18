<?php

use DesignPatterns\Creational\FactoryMethod\Database\Factory\MysqlFactory;
use DesignPatterns\Creational\FactoryMethod\Logger\Stdout\StdoutManagerAbstract;
use Psr\Log\LogLevel;

require __DIR__ . '/vendor/autoload.php';

$logManager = new StdoutManagerAbstract();
$logManager->log(LogLevel::DEBUG, 'Corrêa menagem de log', ['message' => true]);

$databaseManager = new MysqlFactory();
$query = $databaseManager->create();
$result = $query->select('SELECT * FROM users');

PHP_EOL . print_r($result);
