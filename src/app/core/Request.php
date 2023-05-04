<?php namespace PAW\core;

class Request {
    public function getRequestURI() {
        return parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    }

    public function getRequestMethod() {
        return $_SERVER["REQUEST_METHOD"];
    }

    public function getRoute() {
        return [
            $this->getRequestURI(),
            $this->getRequestMethod(),
        ];
    }
}

?>