<?php

// Variables para rutas.
$vendor = __DIR__ . '/../vendor/';
$logs = __DIR__ . '/../logs/app.log';

// Inicialización de plugins.
require $vendor . 'autoload.php';
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

// Uses, carga y configuración de objetos.
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
$logger = new Logger('app-loger');
$logger->pushHandler(new StreamHandler($logs, Logger::DEBUG));

?>