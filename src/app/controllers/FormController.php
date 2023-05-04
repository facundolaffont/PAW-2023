<?php namespace PAW\controllers;

class FormController {
    public function __construct() {
        $this->coreDir = __DIR__ . "/../core/";
    }

    public function direct($route) {
        require $this->coreDir . $route . '.php';
        http_response_code(200);
    }


    /* Private. */

    private string $coreDir;
}
?>