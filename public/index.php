<?php

$srcFolder = __DIR__ . '/../src/';

// Carga el script de inicializaciones.
require $srcFolder . 'bootstrap.php';

// Enrutamiento.
$router->direct($request);
$logger->info("200 (OK).", ["Ruta" => $path]);

?>