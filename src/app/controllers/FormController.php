<?php namespace PAW\controllers;

class FormController {
    public function __construct() {
        $this->coreDir = __DIR__ . "/../core/";
    }

    public function direct($route, $processed = 0) {

        // TODO: procesamiento del formulario.

        // Se procesó correctamente el formulario.
        $pageController = new PageController;
        $pageController->direct(
            substr(
                $route,
                strpos($route, "-") + 1
            ),
            1
        );
    }


    /* Private. */

    private string $coreDir;
}
?>