<?php

// Carga el script de inicializaciones.
require __DIR__ . '/../src/bootstrap.php';

// Uses.
use PAW\core\exceptions\RouteNotFoundException;
use PAW\core\Router;

// Enrutamiento.
$router = new Router;
$router->loadRoutes('/', 'PageController@index');
$router->loadRoutes('/contacto', 'PageController@contacto');
$router->loadRoutes('/crear-cuenta', 'PageController@crear-cuenta');
$router->loadRoutes('/ingresar', 'PageController@ingresar');
$router->loadRoutes('/institucional', 'PageController@institucional');
$router->loadRoutes('/mi-perfil', 'PageController@mi-perfil');
$router->loadRoutes('/mis-turnos', 'PageController@mis-turnos');
$router->loadRoutes('/noticias', 'PageController@noticias');
$router->loadRoutes('/obras-sociales', 'PageController@obras-sociales');
$router->loadRoutes('/pedir-turno', 'PageController@pedir-turno');
$router->loadRoutes('/politicas-privacidad', 'PageController@politicas-privacidad');
$router->loadRoutes('/servicio', 'PageController@servicio');
$router->loadRoutes('/servicios', 'PageController@servicios');
$router->loadRoutes('/tos', 'PageController@tos');
$router->loadRoutes('404', 'ErrorController@404');
$router->loadRoutes('500', 'ErrorController@500');
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$logger->info("Ruta accedida: {$path}.");
try { $router->direct($path); }
catch (RouteNotFoundException $e) {
    $router->direct('404');
    $log->info("404 (Ruta no encontrada).", ["Ruta" => $path]);
}
catch (Exception $e) {
    $router->direct('500');
    $log->error("500 (Error del servidor).", ["Error" => $e]);
}
$logger->info("200 (OK).");

?>