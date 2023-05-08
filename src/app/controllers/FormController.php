<?php namespace PAW\controllers;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use PAW\core\Config;

class FormController {
    
    public function __construct() {
        $logger = new Logger('FormController-logger');
        $config = new Config;
        $handler = new StreamHandler($config->get("LOG_PATH"));
        $handler->setLevel($config->get("LOG_LEVEL"));
        $logger->pushHandler($handler);
        $this->logger = $logger;
        $this->pageController = new PageController;
    }

    public function procesarContacto() {
        if (
               !isset($_POST["nombre"])
            || !isset($_POST["apellido"])
            || !isset($_POST["telefono"])
            || !isset($_POST["mail"])
            || !isset($_POST["consulta"])
        ) {
            // Algún campo no está presente en el cuerpo del requerimiento.   
            $this->logger->debug('$_POST: ' . $_POST, [__FUNCTION__]);
            $this->pageController->contacto(2);
            return;
        }
        
        if (
            !preg_match(
                "/^[a-zA-ZÀ-ÿ\x{00f1}\x{00d1}][a-zA-ZÀ-ÿ\x{00f1}\x{00d1} ]*$/",
                $_POST["nombre"],
            )
            ||
            strlen($_POST["nombre"]) > 30
        ) {
            // Campo nombre vacío, con mal formato o con más de 30 caracteres.
            $this->logger->debug('$_POST["nombre"]: ' . $_POST["nombre"], [__FUNCTION__]);
            $this->pageController->contacto(3);
            return;
        }
        
        if ( 
            !preg_match(
                "/^[a-zA-ZÀ-ÿ\x{00f1}\x{00d1}][a-zA-ZÀ-ÿ\x{00f1}\x{00d1} ]*$/",
                $_POST["apellido"],
            )
            ||
            strlen($_POST["apellido"]) > 30
        ) {
            // Campo apellido vacío, con mal formato o con más de 30 caracteres.
            $this->logger->debug('$_POST["apellido"]: ' . $_POST["apellido"], [__FUNCTION__]);
            $this->pageController->contacto(4);
            return;
        }

        if (
            !preg_match(
                "/^(\+?54)?(15|(0?\d{0,4}))?((\d{4})(\d{4}))$/",
                str_replace(" ", "", $_POST["telefono"]),
            )
            ||
            strlen($_POST["telefono"]) > 20
        ) {
            // Campo teléfono vacío o con mal formato.
            $this->logger->debug('$_POST["telefono"]: ' . $_POST["telefono"], [__FUNCTION__]);
            $this->pageController->contacto(5);
            return;
        }
        
        if (
            !preg_match(
                "/^[a-zA-Z0-9.!#$%&'*+\\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/",
                $_POST["mail"],
            )
            ||
            strlen($_POST["mail"]) > 40
        ) {
            // Campo mail vacío, con mal formato o con más de 40 caracteres.
            $this->logger->debug('$_POST["mail"]: ' . $_POST["mail"], [__FUNCTION__]);
            $this->pageController->contacto(6);
            return;
        }
        
        if (
            $_POST["consulta"] == ""
            || strlen($_POST["consulta"]) > 250
        ) {
            // Campo consulta vacío o con más de 250 caracteres.
            $this->logger->debug('$_POST["consulta"]: ' . $_POST["consulta"], [__FUNCTION__]);
            $this->pageController->contacto(7);
            return;
        }
        
        // Se procesó correctamente.
        $this->pageController->contacto(1);
        
    }

    public function procesarCrearCuenta() {
        // Se procesa correctamente.
        $this->pageController->ingresar();
    }

    public function procesarIngresar() {
        // Se procesa correctamente.
        $this->pageController->index();
    }

    public function procesarPedirTurno() {
        if (
               !isset($_POST["servicio"])
            || !isset($_POST["profesional"])
            || !isset($_POST["fecha-turno"])
            || !isset($_POST["hora-turno"])
            || !isset($_POST["paciente"])
            || !isset($_POST["nombre"])
            || !isset($_POST["apellido"])
            || !isset($_POST["fecha-nac"])
            || !isset($_POST["edad"])
            || !isset($_POST["telefono"])
            || !isset($_POST["mail"])
        ) {
            // Algún campo no está presente en el cuerpo del requerimiento.
            $this->pageController->pedirTurno(2);
            $this->logger->debug('$_POST: ' . $_POST, [__FUNCTION__]);
            return;
        }
        
        if (
            !preg_match(
                "/^\d+$/",
                $_POST["servicio"],
            )
            ||
            $_POST["servicio"] == 0
        ) {
            // Campo servicio (ID) vacío, igual a cero o con mal formato.
            $this->logger->debug('$_POST["servicio"]: ' . $_POST["servicio"], [__FUNCTION__]);
            $this->pageController->pedirTurno(3);
            return;
        }
        
        if ( 
            !preg_match(
                "/^\d+$/",
                $_POST["profesional"],
            )
            ||
            $_POST["profesional"] == 0
        ) {
            // Campo profesional (ID) vacío, igual a cero o con mal formato.
            $this->logger->debug('$_POST["profesional"]: ' . $_POST["profesional"], [__FUNCTION__]);
            $this->pageController->pedirTurno(4);
            return;
        }

        if (
            !preg_match(
                "/^\d{4}-\d{1,2}-\d{1,2}$/",
                $_POST["fecha-turno"],
            )
        ) {
            // Campo teléfono vacío o con mal formato.
            $this->logger->debug('$_POST["fecha-turno"]: ' . $_POST["fecha-turno"], [__FUNCTION__]);
            $this->pageController->pedirTurno(5);
            return;
        }
        
        if (
            !preg_match(
                "/^\d{2}:\d{2}$/",
                $_POST["hora-turno"],
            )
        ) {
            // Campo hora-turno vacío o con mal formato.
            $this->logger->debug('$_POST["hora-turno"]: ' . $_POST["hora-turno"], [__FUNCTION__]);
            $this->pageController->pedirTurno(6);
            return;
        }

        if ($_POST["paciente"] == "+") {
            if (
                !preg_match(
                    "/^[a-zA-ZÀ-ÿ\x{00f1}\x{00d1}][a-zA-ZÀ-ÿ\x{00f1}\x{00d1} ]*$/",
                    $_POST["nombre"],
                )
                ||
                strlen($_POST["nombre"]) > 30
            ) {
                // Campo nombre vacío, con mal formato o con más de 30 caracteres.
                $this->logger->debug('$_POST["nombre"]: ' . $_POST["nombre"], [__FUNCTION__]);
                $this->pageController->pedirTurno(8);
                return;
            }
    
            if (
                !preg_match(
                    "/^[a-zA-ZÀ-ÿ\x{00f1}\x{00d1}][a-zA-ZÀ-ÿ\x{00f1}\x{00d1} ]*$/",
                    $_POST["apellido"],
                )
                ||
                strlen($_POST["apellido"]) > 30
            ) {
                // Campo apellido vacío, con mal formato o con más de 30 caracteres.
                $this->logger->debug('$_POST["apellido"]: ' . $_POST["apellido"], [__FUNCTION__]);
                $this->pageController->pedirTurno(9);
                return;
            }
    
            if (
                !preg_match(
                    "/^\d{4}-\d{1,2}-\d{1,2}$/",
                    $_POST["fecha-nac"],
                )
            ) {
                // Campo fecha-nac vacío o con mal formato.
                $this->logger->debug('$_POST["fecha-nac"]: ' . $_POST["fecha-nac"], [__FUNCTION__]);
                $this->pageController->pedirTurno(10);
                return;
            }

            if (
                !preg_match(
                    "/^(1?[0-9]{1,2}|200)$/",
                    $_POST["edad"],
                )
            ) {
                // Campo edad vacío, con mal rango o con mal formato.
                $this->logger->debug('$_POST["edad"]: ' . $_POST["edad"], [__FUNCTION__]);
                $this->pageController->pedirTurno(11);
                return;
            }

            if (
                !preg_match(
                    "/^(\+?54)?(15|(0?\d{0,4}))?((\d{4})(\d{4}))$/",
                    str_replace(" ", "", $_POST["telefono"]),
                )
                ||
                strlen($_POST["telefono"]) > 20
            ) {
                // Campo telefono vacío o con mal formato.
                $this->logger->debug('$_POST["telefono"]: ' . $_POST["telefono"], [__FUNCTION__]);
                $this->pageController->pedirTurno(12);
                return;
            }

            if (
                !preg_match(
                    "/^[a-zA-Z0-9.!#$%&'*+\\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/",
                    $_POST["mail"],
                )
                ||
                strlen($_POST["mail"]) > 40
            ) {
                // Campo mail vacío, con mal formato o con más de 40 caracteres.
                $this->logger->debug('$_POST["mail"]: ' . $_POST["mail"], [__FUNCTION__]);
                $this->pageController->pedirTurno(13);
                return;
            }
        } else if (
            !preg_match(
                "/^\d+$/",
                $_POST["paciente"],
            )
            ||
            $_POST["paciente"] == 0
        ) {
            // Campo paciente (ID) vacío, igual a cero o con mal formato.
            $this->logger->debug('$_POST["paciente"]: ' . $_POST["paciente"], [__FUNCTION__]);
            $this->pageController->pedirTurno(7);
            return;
        }

        // Se procesa correctamente.
        $this->pageController->pedirTurno(1);
    }


    /* Private. */

    private PageController $pageController;
    private Logger $logger;
}
?>