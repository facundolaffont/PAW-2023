<?php

// Variables para rutas.
$projectFolder = __DIR__ . '/../';
$srcFolder = __DIR__ . '/../src/';
$vendor = __DIR__ . '/../vendor/';

// Inicialización de plugins.
require $vendor . 'autoload.php';
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

// Uses.
require $srcFolder . 'app/core/Router.php';
require $srcFolder . 'app/core/Config.php';
require $srcFolder . 'app/core/Request.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Dotenv\Dotenv;
use PAW\core\Router;
use PAW\core\Config;
use PAW\core\Request;

// Configuraciones iniciales.
$dotenv = Dotenv::createUnsafeImmutable($projectFolder);
$dotenv->load();
$config = new Config;
$logger = new Logger('app-loger');
$handler = new StreamHandler($config->get("LOG_PATH"));
$handler->setLevel($config->get("LOG_LEVEL"));
$logger->pushHandler($handler);
$request = new Request;
$router = new Router;
$router->setLogger($logger);

/* Carga de rutas. */
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

?>