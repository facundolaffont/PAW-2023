<?php
namespace PAW\core;

// Uses.
$appDir = __DIR__ . '/../';
require $appDir . 'controllers/PageController.php';
require $appDir . 'controllers/ErrorController.php';
require $appDir . 'core/exceptions/RouteNotFoundException.php';
use PAW\core\exceptions\RouteNotFoundException;

class Router {
    public array $routes = [
        "GET" => [],
        "POST" => [],
    ];
    
    public function loadRoutes($path, $controllerAndRoute, $method = "GET") {
        $this->routes[$method][$path] = $controllerAndRoute;
    }

    public function loadToGet($path, $controllerAndRoute) {
        $this->loadRoutes($path, $controllerAndRoute, "GET");
    }

    public function loadToPost($path, $controllerAndRoute) {
        $this->loadRoutes($path, $controllerAndRoute, "POST");
    }

    public function direct($path, $method = "GET") {
        if (!$this->exists($path, $method))
            throw new RouteNotFoundException("La ruta no existe.");

        list($controller, $route) = $this->getControllerAndRoute($path, $method);
        $controllerName = "PAW\\controllers\\{$controller}";
        $controllerObject = new $controllerName;
        if ($controller == 'PageController')
            $controllerObject->showPage($route);
        else if ($controller == 'ErrorController')
            $controllerObject->$route();
    }


    /* Private. */

    private function exists($path, $method) {
        return array_key_exists($path, $this->routes[$method]);
    }

    private function getControllerAndRoute($path, $method) {
        return explode('@', $this->routes[$method][$path]);
    }
}
?>