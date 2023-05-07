<?php namespace PAW\controllers;

class FormController {
    
    public function __construct() {
        $this->pageController = new PageController;
    }

    public function procesarContacto() {

        if (
            preg_match(
                "/^[a-zA-Z ]{1,30}/",
                $_POST["nombre"],
            )
            && preg_match(
                "/^[a-zA-Z ]{1,30}/",
                $_POST["apellido"],
            )
            && preg_match(
                "/(\+?54)?(15|(0?\d{0,4}))?((\d{4})(\d{4}))/",
                $_POST["telefono"],
            )
            && preg_match(
                "/^[a-zA-Z0-9.!#$%&'*+\\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/",
                $_POST["mail"],
            )
            && $_POST["consulta"] == ""
        ) {
            // Se procesa correctamente.
            $this->pageController->contacto(1);
            http_response_code(200);
        } else {
            print_r(preg_match(
                "/^[a-zA-Z ]{1,30}/",
                $_POST["nombre"],
            ));
            print_r(preg_match(
                "/^[a-zA-Z ]{1,30}/",
                $_POST["apellido"],
            ));
            print_r(preg_match(
                "/(\+?54)?(15|(0?\d{0,4}))?((\d{4})(\d{4}))/",
                $_POST["telefono"],
            ));
            print_r(preg_match(
                "/^[a-zA-Z0-9.!#$%&'*+\\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/",
                $_POST["mail"],
            ));
            print_r($_POST["consulta"] != "");
            die;
            // No se cumplen todas las condiciones.
            $this->pageController->contacto(2);
            http_response_code(428);
        }
    }

    public function procesarCrearCuenta() {
        // Se procesa correctamente.
        $this->pageController->ingresar();
        http_response_code(200);
    }

    public function procesarIngresar() {
        // Se procesa correctamente.
        $this->pageController->index();
        http_response_code(200);
    }

    public function procesarPedirTurno() {
        // Se procesa correctamente.
        $this->pageController->pedirTurno(1);
        http_response_code(200);
    }


    /* Private. */

    private PageController $pageController;
}
?>