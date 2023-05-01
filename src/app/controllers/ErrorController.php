<?php
    namespace PAW\app\controllers;
     
    class ErrorController {
        public string $viewsDir;

        public function __construct() {
            $this->viewsDir = __DIR__ . "/../views/";
        }

        public function showNotFoundPage() {
            http_response_code(404);
            require $this->viewsDir . '404.view.php';
        }

        public function internalError() {
            http_response_code(500);
            require $this->viewsDir . '505.view.php';
        }
    }
?>