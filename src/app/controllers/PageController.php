<?php
namespace PAW\controllers;

class PageController {
    public function __construct() {
        $this->viewsDir = __DIR__ . "/../views/";
    }

    public function showPage($route) {
        require $this->viewsDir . $route . '.view.php';
        http_response_code(200);
    }


    /* Private. */

    private string $viewsDir;
}
?>