<?php namespace PAW\controllers;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use PAW\core\Config;

class PageController {
    public function __construct() {
        $logger = new Logger('PageController-logger');
        $config = new Config;
        $handler = new StreamHandler($config->get("LOG_PATH"));
        $handler->setLevel($config->get("LOG_LEVEL"));
        $logger->pushHandler($handler);
        $this->logger = $logger;
        $this->viewsDir = __DIR__ . "/../views/";
    }

    public function contacto($processed = 0, $responseCode = 200) {
        $this->logger->debug("Valor de \$processed: $processed", [__FUNCTION__]);
        $this->logger->info("Código de respuesta HTTP: $responseCode", [__FUNCTION__]);
        http_response_code($responseCode);
        require $this->viewsDir . 'contacto.view.php';
    }

    public function crearCuenta($responseCode = 200) {
        $this->logger->info("Código de respuesta HTTP: $responseCode", [__FUNCTION__]);
        http_response_code($responseCode);
        require $this->viewsDir . 'crear-cuenta.view.php';
    }

    public function index($responseCode = 200) {
        $this->logger->info("Código de respuesta HTTP: $responseCode", [__FUNCTION__]);
        http_response_code($responseCode);
        require $this->viewsDir . 'index.view.php';
    }

    public function ingresar($responseCode = 200) {
        $this->logger->info("Código de respuesta HTTP: $responseCode", [__FUNCTION__]);
        http_response_code($responseCode);
        require $this->viewsDir . 'ingresar.view.php';
    }

    public function institucional($responseCode = 200) {
        $this->logger->info("Código de respuesta HTTP: $responseCode", [__FUNCTION__]);
        http_response_code($responseCode);
        require $this->viewsDir . 'institucional.view.php';
    }

    public function miPerfil($responseCode = 200) {
        $this->logger->info("Código de respuesta HTTP: $responseCode", [__FUNCTION__]);
        http_response_code($responseCode);
        require $this->viewsDir . 'mi-perfil.view.php';
    }

    public function misTurnos($responseCode = 200) {
        $this->logger->info("Código de respuesta HTTP: $responseCode", [__FUNCTION__]);
        http_response_code($responseCode);
        require $this->viewsDir . 'mis-turnos.view.php';
    }

    public function noticias($responseCode = 200) {
        $this->logger->info("Código de respuesta HTTP: $responseCode", [__FUNCTION__]);
        http_response_code($responseCode);
        require $this->viewsDir . 'noticias.view.php';
    }

    public function obrasSociales($responseCode = 200) {
        $this->logger->info("Código de respuesta HTTP: $responseCode", [__FUNCTION__]);
        http_response_code($responseCode);
        require $this->viewsDir . 'obras-sociales.view.php';
    }

    public function pedirTurno($processed = 0, $responseCode = 200) {
        $this->logger->debug("Valor de \$processed: $processed", [__FUNCTION__]);
        $this->logger->info("Código de respuesta HTTP: $responseCode", [__FUNCTION__]);
        http_response_code($responseCode);
        require $this->viewsDir . 'pedir-turno.view.php';
    }

    public function politicasPrivacidad($responseCode = 200) {
        $this->logger->info("Código de respuesta HTTP: $responseCode", [__FUNCTION__]);
        http_response_code($responseCode);
        require $this->viewsDir . 'politicas-privacidad.view.php';
    }

    public function servicio($responseCode = 200) {
        $this->logger->info("Código de respuesta HTTP: $responseCode", [__FUNCTION__]);
        http_response_code($responseCode);
        require $this->viewsDir . 'servicio.view.php';
    }

    public function servicios($responseCode = 200) {
        $this->logger->info("Código de respuesta HTTP: $responseCode", [__FUNCTION__]);
        http_response_code($responseCode);
        require $this->viewsDir . 'servicios.view.php';
    }

    public function tos($responseCode = 200) {
        $this->logger->info("Código de respuesta HTTP: $responseCode", [__FUNCTION__]);
        http_response_code($responseCode);
        require $this->viewsDir . 'tos.view.php';
    }


    /* Private. */

    private string $viewsDir;
    private Logger $logger;
}
?>