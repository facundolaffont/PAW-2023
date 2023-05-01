<?php

namespace PAW\core;

use PAW\controllers\PageController;
use PAW\controllers\ErrorController;
use PAW\core\exceptions\RouteNotFoundException;

class Router {
    public array $routes;

    public function loadRoutes($path, $controllerAndRoute) {
        $this->routes[$path] = $controllerAndRoute;
    }

    public function direct($path) {
        if (!array_key_exists($path, $this->routes))
            throw new RouteNotFoundException("La ruta no existe.");

        list($controller, $route)  = explode('@', $this->routes[$path]);
        $controllerObject = new $controller;
        $controllerObject->showPage($route);
    }
}

?>