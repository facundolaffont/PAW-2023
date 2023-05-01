<?php

$srcFolder = __DIR__ . '/../src/';

// Carga el script de inicializaciones.
require $srcFolder . 'bootstrap.php';

// Uses.
use PAW\core\exceptions\RouteNotFoundException;

// Enrutamiento.
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$requestMethod = $_SERVER["REQUEST_METHOD"];
$logger->info("Petición ({$requestMethod}) a {$path}.");
try {
    $router->direct($path, $requestMethod);
    $logger->info("200 (OK).", ["Ruta" => $path]);
}
catch (RouteNotFoundException $e) {
    $router->direct('showNotFoundPage');
    $logger->info("404 (Ruta no encontrada).", ["Ruta" => $path]);
}
catch (Exception $e) {
    $router->direct('showInternalErrorPage');
    $logger->error("500 (Error del servidor).", ["Error" => $e]);
}

?>