<?php namespace PAW\controllers;

class PageController {
    public function __construct() {
        $this->viewsDir = __DIR__ . "/../views/";
    }

    public function direct($route, $processed = 0) {
        require $this->viewsDir . $route . '.view.php';
        http_response_code(200);
    }


    /* Private. */

    private string $viewsDir;
}
?>