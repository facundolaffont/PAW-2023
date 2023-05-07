<?php namespace PAW\controllers;
    
class ErrorController {
    public string $viewsDir;

    public function __construct() {
        $this->viewsDir = __DIR__ . "/../views/";
    }

    public function showPageNotFound() {
        require $this->viewsDir . '404.view.php';
        http_response_code(404);
    }

    public function showInternalErrorPage() {
        require $this->viewsDir . '500.view.php';
        http_response_code(500);
    }
}
?>