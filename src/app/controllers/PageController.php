<?php

namespace PAW\controllers;

class PageController {
    public function __construct() {
        $this->viewsDir = __DIR__ . "/../views/";
        $this->routes = array(
            '/pedir-turno' => 'pedir-turno.view.php',
        );
    }

    public function showPage($route) {
        http_response_code(200);
        require $this->viewsDir . $route;
    }


    /* Private. */

    private array $routes;
    private string $viewsDir;
}

?>