<?php

// Variables para rutas.
$vendor = __DIR__ . '/../vendor/';
$logs = __DIR__ . '/../logs/app.log';
$srcFolder = __DIR__ . '/../src/';

// Inicialización de plugins.
require $vendor . 'autoload.php';
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

// Uses, carga y configuración de objetos.
require $srcFolder . 'app/core/Router.php';
use PAW\core\Router;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
$logger = new Logger('app-loger');
$logger->pushHandler(new StreamHandler($logs, Logger::DEBUG));

/* Carga de rutas. */
$router = new Router;

$router->loadToGet('/', 'PageController@index');

$router->loadToGet('/contacto', 'PageController@contacto');
$router->loadToPost('/contacto', 'FormController@procesar-contacto');

$router->loadToGet('/crear-cuenta', 'PageController@crear-cuenta');
$router->loadToPost('/crear-cuenta', 'FormController@procesar-creacion-cuenta');

$router->loadToGet('/ingresar', 'PageController@ingresar');
$router->loadToPost('/ingresar', 'FormController@procesar-login');

$router->loadToGet('/institucional', 'PageController@institucional');

$router->loadToGet('/mi-perfil', 'PageController@mi-perfil');

$router->loadToGet('/mis-turnos', 'PageController@mis-turnos');

$router->loadToGet('/noticias', 'PageController@noticias');

$router->loadToGet('/obras-sociales', 'PageController@obras-sociales');

$router->loadToGet('/pedir-turno', 'PageController@pedir-turno');
$router->loadToPost('/pedir-turno', 'FormController@procesar-pedido-turno');

$router->loadToGet('/politicas-privacidad', 'PageController@politicas-privacidad');

$router->loadToGet('/servicio', 'PageController@servicio');

$router->loadToGet('/servicios', 'PageController@servicios');

$router->loadToGet('/tos', 'PageController@tos');

$router->loadToGet('showNotFoundPage', 'ErrorController@showNotFoundPage');

$router->loadToGet('showInternalErrorPage', 'ErrorController@showInternalErrorPage');

?>