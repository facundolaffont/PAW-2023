<?php namespace PAW\controllers;

class PageController {
    public function __construct() {
        $this->viewsDir = __DIR__ . "/../views/";
    }

    public function contacto($processed = 0) {
        require $this->viewsDir . 'contacto.view.php';
        http_response_code(200);
    }

    public function crearCuenta() {
        require $this->viewsDir . 'crear-cuenta.view.php';
        http_response_code(200);
    }

    public function index() {
        require $this->viewsDir . 'index.view.php';
        http_response_code(200);
    }

    public function ingresar() {
        require $this->viewsDir . 'ingresar.view.php';
        http_response_code(200);
    }

    public function institucional() {
        require $this->viewsDir . 'institucional.view.php';
        http_response_code(200);
    }

    public function miPerfil() {
        require $this->viewsDir . 'mi-perfil.view.php';
        http_response_code(200);
    }

    public function misTurnos() {
        require $this->viewsDir . 'mis-turnos.view.php';
        http_response_code(200);
    }

    public function noticias() {
        require $this->viewsDir . 'noticias.view.php';
        http_response_code(200);
    }

    public function obrasSociales() {
        require $this->viewsDir . 'obras-sociales.view.php';
        http_response_code(200);
    }

    public function pedirTurno($processed = 0) {
        require $this->viewsDir . 'pedir-turno.view.php';
        http_response_code(200);
    }

    public function politicasPrivacidad() {
        require $this->viewsDir . 'politicas-privacidad.view.php';
        http_response_code(200);
    }

    public function servicio() {
        require $this->viewsDir . 'servicio.view.php';
        http_response_code(200);
    }

    public function servicios() {
        require $this->viewsDir . 'servicios.view.php';
        http_response_code(200);
    }

    public function tos() {
        require $this->viewsDir . 'tos.view.php';
        http_response_code(200);
    }

    public function direct($route, $processed = 0) {
        require $this->viewsDir . $route . '.view.php';
        http_response_code(200);
    }


    /* Private. */

    private string $viewsDir;
}
?>