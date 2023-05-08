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
            $this->logger->debug('$_POST: ' . $_POST, [__FUNCTION__]);
            $this->pageController->contacto(2);
            return;
        }
        
        if (!$this->validProperName($_POST["nombre"])) {
            $this->logger->debug('$_POST["nombre"]: ' . $_POST["nombre"], [__FUNCTION__]);
            $this->pageController->contacto(3);
            return;
        }
        
        if (!$this->validProperName($_POST["apellido"])) {
            $this->logger->debug('$_POST["apellido"]: ' . $_POST["apellido"], [__FUNCTION__]);
            $this->pageController->contacto(4);
            return;
        }

        if (!$this->validTelephone($_POST["telefono"])) {
            $this->logger->debug('$_POST["telefono"]: ' . $_POST["telefono"], [__FUNCTION__]);
            $this->pageController->contacto(5);
            return;
        }
        
        if (!$this->validEmail($_POST["mail"])) {
            $this->logger->debug('$_POST["mail"]: ' . $_POST["mail"], [__FUNCTION__]);
            $this->pageController->contacto(6);
            return;
        }
        
        if (
            $_POST["consulta"] == ""
            || strlen($_POST["consulta"]) > 250
        ) {
            $this->logger->debug('$_POST["consulta"]: ' . $_POST["consulta"], [__FUNCTION__]);
            $this->pageController->contacto(7);
            return;
        }
        
        // Se procesó correctamente.
        $this->pageController->contacto(1);
        
    }

    public function procesarCrearCuenta() {
        if (
               !isset($_POST["nombre"])
            || !isset($_POST["apellido"])
            || !isset($_POST["dni"])
            || !isset($_POST["fecha-nac"])
            || !isset($_POST["telefono"])
            || !isset($_POST["mail"])
            || !isset($_POST["mail2"])
            || !isset($_POST["pass"])
            || !isset($_POST["pass2"])
        ) {
            $this->logger->debug('$_POST: ' . $_POST, [__FUNCTION__]);
            $this->pageController->crearCuenta(2);
            return;
        }

        if (!$this->validProperName($_POST["nombre"])) {
            $this->logger->debug('$_POST["nombre"]: ' . $_POST["nombre"], [__FUNCTION__]);
            $this->pageController->crearCuenta(3);
            return;
        }

        if (!$this->validProperName($_POST["apellido"])) {
            $this->logger->debug('$_POST["apellido"]: ' . $_POST["apellido"], [__FUNCTION__]);
            $this->pageController->crearCuenta(4);
            return;
        }

        if (!$this->validDNI($_POST["dni"])) {
            $this->logger->debug('$_POST["dni"]: ' . $_POST["dni"], [__FUNCTION__]);
            $this->pageController->crearCuenta(5);
            return;
        }

        if (!$this->validDate($_POST["fecha-nac"])) {
            $this->logger->debug('$_POST["fecha-nac"]: ' . $_POST["fecha-nac"], [__FUNCTION__]);
            $this->pageController->crearCuenta(6);
            return;
        }

        if (!$this->validTelephone($_POST["telefono"])) {
            $this->logger->debug('$_POST["telefono"]: ' . $_POST["telefono"], [__FUNCTION__]);
            $this->pageController->crearCuenta(7);
            return;
        }

        if (!$this->validEmail($_POST["mail"])) {
            $this->logger->debug('$_POST["mail"]: ' . $_POST["mail"], [__FUNCTION__]);
            $this->pageController->crearCuenta(8);
            return;
        }

        if (!$this->validEmail($_POST["mail2"])) {
            $this->logger->debug('$_POST["mail2"]: ' . $_POST["mail2"], [__FUNCTION__]);
            $this->pageController->crearCuenta(9);
            return;
        }

        if (!$this->validPass($_POST["pass"])) {
            $this->logger->debug('$_POST["pass"]: ' . $_POST["pass"], [__FUNCTION__]);
            $this->pageController->crearCuenta(10);
            return;
        }

        if (!$this->validPass($_POST["pass2"])) {
            $this->logger->debug('$_POST["pass2"]: ' . $_POST["pass2"], [__FUNCTION__]);
            $this->pageController->crearCuenta(11);
            return;
        }

        // Se procesa correctamente.
        $this->pageController->ingresar(1, $_POST["mail"]);
    }

    public function procesarIngresar() {
        if (
               !isset($_POST["usuario"])
            || !isset($_POST["pass"])
        ) {
            $this->logger->debug('$_POST: ' . $_POST, [__FUNCTION__]);
            $this->pageController->ingresar(2);
            return;
        }
        
        if (!$this->validUser($_POST["usuario"])) {
            $this->logger->debug('$_POST["usuario"]: ' . $_POST["usuario"], [__FUNCTION__]);
            $this->pageController->ingresar(3);
            return;
        }

        if (!$this->validPass($_POST["pass"])) {
            $this->logger->debug('$_POST["pass"]: ' . $_POST["pass"], [__FUNCTION__]);
            $this->pageController->ingresar(4);
            return;
        }
        
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
            $this->logger->debug('$_POST: ' . $_POST, [__FUNCTION__]);
            $this->pageController->pedirTurno(2);
            return;
        }
        
        if (!$this->validID($_POST["servicio"])) {
            $this->logger->debug('$_POST["servicio"]: ' . $_POST["servicio"], [__FUNCTION__]);
            $this->pageController->pedirTurno(3);
            return;
        }
        
        if (!$this->validID($_POST["profesional"])) {
            $this->logger->debug('$_POST["profesional"]: ' . $_POST["profesional"], [__FUNCTION__]);
            $this->pageController->pedirTurno(4);
            return;
        }

        if (!$this->validDate($_POST["fecha-turno"])) {
            $this->logger->debug('$_POST["fecha-turno"]: ' . $_POST["fecha-turno"], [__FUNCTION__]);
            $this->pageController->pedirTurno(5);
            return;
        }
        
        if (!$this->validHora($_POST["hora-turno"])) {
            $this->logger->debug('$_POST["hora-turno"]: ' . $_POST["hora-turno"], [__FUNCTION__]);
            $this->pageController->pedirTurno(6);
            return;
        }

        if ($_POST["paciente"] == "+") {
            if (!$this->validProperName($_POST["nombre"])) {
                $this->logger->debug('$_POST["nombre"]: ' . $_POST["nombre"], [__FUNCTION__]);
                $this->pageController->pedirTurno(8);
                return;
            }
    
            if (!$this->validProperName($_POST["apellido"])) {
                $this->logger->debug('$_POST["apellido"]: ' . $_POST["apellido"], [__FUNCTION__]);
                $this->pageController->pedirTurno(9);
                return;
            }
    
            if (!$this->validDate($_POST["fecha-nac"])) {
                $this->logger->debug('$_POST["fecha-nac"]: ' . $_POST["fecha-nac"], [__FUNCTION__]);
                $this->pageController->pedirTurno(10);
                return;
            }

            if (!$this->validEdad($_POST["edad"])) {
                $this->logger->debug('$_POST["edad"]: ' . $_POST["edad"], [__FUNCTION__]);
                $this->pageController->pedirTurno(11);
                return;
            }

            if (!$this->validTelephone($_POST["telefono"])) {
                $this->logger->debug('$_POST["telefono"]: ' . $_POST["telefono"], [__FUNCTION__]);
                $this->pageController->pedirTurno(12);
                return;
            }

            if (!$this->validEmail($_POST["mail"])) {
                $this->logger->debug('$_POST["mail"]: ' . $_POST["mail"], [__FUNCTION__]);
                $this->pageController->pedirTurno(13);
                return;
            }
        } else if (!$this->validID($_POST["paciente"])) {
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

    private function validTelephone($telephone) {
        if (
            !preg_match(
                "/^(\+?54)?(15|(0?\d{0,4}))?((\d{4})(\d{4}))$/",
                str_replace(" ", "", $telephone),
            )
            ||
            strlen($telephone) > 20
        ) return false;

        return true;
    }

    private function validProperName($name) {
        if (
            !preg_match(
                "/^[a-zA-ZÀ-ÿ\x{00f1}\x{00d1}][a-zA-ZÀ-ÿ\x{00f1}\x{00d1} ]*$/",
                $name,
            )
            ||
            strlen($name) > 30
        ) return false;

        return true;
    }

    private function validDate($date) {
        if (
            !preg_match(
                "/^\d{4}-\d{1,2}-\d{1,2}$/",
                $date,
            )
        ) return false;

        return true;
    }

    private function validID($id) {
        if (
            !preg_match(
                "/^\d+$/",
                $id,
            )
            ||
            $id == 0
        ) return false;

        return true;
    }

    private function validEmail($email) {
        if (
            !preg_match(
                "/^[a-zA-Z0-9.!#$%&'*+\\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/",
                $email,
            )
            ||
            strlen($email) > 40
        ) return false;

        return true;
    }

    private function validHora($hora) {
        if (
            !preg_match(
                "/^\d{2}:\d{2}$/",
                $hora,
            )
        ) return false;

        return true;
    }

    private function validEdad($edad) {
        if (
            !preg_match(
                "/^(1?[0-9]{1,2}|200)$/",
                $edad,
            )
        ) return false;

        return true;
    }

    private function validDNI($dni) {
        if (
            !preg_match(
                "/^\d+$/",
                $dni,
            )
        ) return false;

        return true;
    }

    private function validUser($user) {
        if (
            strlen($user) > 30
        ) return false;

        return true;
    }

    private function validPass($pass) {
        if (
            strlen($pass) < 10
        ) return false;

        return true;
    }
}
?>