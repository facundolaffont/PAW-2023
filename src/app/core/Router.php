<?php
namespace PAW\core;

$appDir = __DIR__ . '/../';
require $appDir . 'controllers/PageController.php';
require $appDir . 'controllers/ErrorController.php';
require $appDir . 'core/exceptions/RouteNotFoundException.php';
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
        $controllerName = "PAW\\controllers\\{$controller}";
        $controllerObject = new $controllerName;
        if ($controller == 'PageController')
            $controllerObject->showPage($route);
        else if ($controller == 'ErrorController')
            $controllerObject->$route();
    }
}
?>