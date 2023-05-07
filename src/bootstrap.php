<?php

// Variables para rutas.
$projectFolder = __DIR__ . '/../';
$vendor = __DIR__ . '/../vendor/';

// Inicialización de plugins.
require $vendor . 'autoload.php';
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

// Uses.
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
    $router->loadToPost('/contacto', 'FormController@procesarContacto');
$router->loadToGet('/crear-cuenta', 'PageController@crearCuenta');
    $router->loadToPost('/crear-cuenta', 'FormController@procesarCrearCuenta');
$router->loadToGet('/ingresar', 'PageController@ingresar');
    $router->loadToPost('/ingresar', 'FormController@procesarIngresar');
$router->loadToGet('/institucional', 'PageController@institucional');
$router->loadToGet('/mi-perfil', 'PageController@miPerfil');
$router->loadToGet('/mis-turnos', 'PageController@misTurnos');
$router->loadToGet('/noticias', 'PageController@noticias');
$router->loadToGet('/obras-sociales', 'PageController@obrasSociales');
$router->loadToGet('/pedir-turno', 'PageController@pedirTurno');
    $router->loadToPost('/pedir-turno', 'FormController@procesarPedirTurno');
$router->loadToGet('/politicas-privacidad', 'PageController@politicasPrivacidad');
$router->loadToGet('/servicio', 'PageController@servicio');
$router->loadToGet('/servicios', 'PageController@servicios');
$router->loadToGet('/tos', 'PageController@tos');

?>