<?php namespace PAW\core;

// Uses.
use \Exception;
use PAW\core\exceptions\RouteNotFoundException;
use PAW\core\Request;
use PAW\core\traits\Loggable;

class Router {
    use Loggable;

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
            $this->logger->info("200 (OK).", [
                "Ruta" => $path,
                "Método" => $method,
            ]);
        }
        catch (RouteNotFoundException $e) {
            list($controller, $route) = $this->getControllerAndRoute($this->notFound, "GET");
            $controllerName = "PAW\\controllers\\{$controller}";
            $controllerObject = new $controllerName;
            $controllerObject->$route();
            $this->logger->debug("404 (Ruta no encontrada).", ["Error" => $e]);
        }
        catch (Exception $e) {
            list($controller, $route) = $this->getControllerAndRoute($this->internalError, "GET");
            $controllerName = "PAW\\controllers\\{$controller}";
            $controllerObject = new $controllerName;
            $controllerObject->$route();
            $this->logger->error("500 (Error del servidor).", ["Error" => $e]);
        }
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