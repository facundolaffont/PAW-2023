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
    public string $notFound = 'showPageNotFound';
    public string $internalError = 'showInternalErrorPage';

    public function __construct() {
        $this->loadToGet($this->notFound, 'ErrorController@' . $this->notFound);
        $this->loadToGet($this->internalError, 'ErrorController@' . $this->internalError);
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
            $this->logger->debug("\$path: $path, \$method: $method", ["Función: {__FUNCTION__}"]);
            list($controller, $route) = $this->getControllerAndRoute($path, $method);
            $this->logger->debug("\$controller: $controller, \$route: $route", ["Función: {__FUNCTION__}"]);
            $this->call($controller, $route);
        }
        catch (RouteNotFoundException $e) {
            list($controller, $route) = $this->getControllerAndRoute($this->notFound, "GET");
            $this->call($controller, $route);
            $this->logger->debug("404 (Ruta no encontrada).", ["Error" => $e]);
        }
        catch (Exception $e) {
            list($controller, $route) = $this->getControllerAndRoute($this->internalError, "GET");
            $this->call($controller, $route);
            $this->logger->error("500 (Error del servidor).", ["Error" => $e]);
        }
    }


    /* Private. */

    private function call($controller, $route) {
        $controllerName = "PAW\\controllers\\{$controller}";
        $controllerObject = new $controllerName;
        $controllerObject->$route();
    }

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