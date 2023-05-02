<?php
namespace PAW\core;

// Uses.
$appDir = __DIR__ . '/../';
require $appDir . 'controllers/PageController.php';
require $appDir . 'controllers/ErrorController.php';
require $appDir . 'controllers/FormController.php';
require $appDir . 'core/exceptions/RouteNotFoundException.php';
use PAW\core\exceptions\RouteNotFoundException;
use PAW\core\Request;
use \Exception;

class Router {
    public array $routes = [
        "GET" => [],
        "POST" => [],
    ];
    public string $notFound = 'showNotFoundPage';
    public string $internalError = 'showInternalErrorPage';

    public function __construct() {
        $this->loadToGet($this->notFound, 'ErrorController@showNotFoundPage');
        $this->loadToGet($this->internalError, 'ErrorController@showInternalErrorPage');
    }

    public function loadRoutes($path, $controllerAndRoute, $method = "GET") {
        $this->routes[$method][$path] = $controllerAndRoute;
    }

    public function loadToGet($path, $controllerAndRoute) {
        $this->loadRoutes($path, $controllerAndRoute, "GET");
    }

    public function loadToPost($path, $controllerAndRoute) {
        $this->loadRoutes($path, $controllerAndRoute, "POST");
    }

    public function direct(Request $request) {
        try {
            list($path, $method) = $request->getRoute();
            list($controller, $route) = $this->getControllerAndRoute($path, $method);
            $controllerName = "PAW\\controllers\\{$controller}";
            $controllerObject = new $controllerName;
            $controllerObject->direct($route);
        }
        catch (RouteNotFoundException $e) {
            list($controller, $route) = $this->getControllerAndRoute($this->notFound, "GET");
            $logger->info("404 (Ruta no encontrada).", ["Ruta" => $path]);
            $controllerName = "PAW\\controllers\\{$controller}";
            $controllerObject = new $controllerName;
            $controllerObject->$route();
        }
        catch (Exception $e) {
            list($controller, $route) = $this->getControllerAndRoute($this->internalError, "GET");
            $logger->error("500 (Error del servidor).", ["Error" => $e]);
            $controllerName = "PAW\\controllers\\{$controller}";
            $controllerObject = new $controllerName;
            $controllerObject->$route();
        }
    }

    public function call($controller, $route) {
        $controllerName = "PAW\\controllers\\{$controller}";
        $controllerObject = new $controllerName;
        $controllerObject->$route();
    }


    /* Private. */

    private function exists($path, $method) {
        return array_key_exists($path, $this->routes[$method]);
    }

    private function getControllerAndRoute($path, $method) {
        if (!$this->exists($path, $method))
                throw new RouteNotFoundException("La ruta no existe.");

        return explode('@', $this->routes[$method][$path]);
    }
}
?>