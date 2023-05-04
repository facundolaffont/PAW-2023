<?php namespace PAW\core;

class Config {

    public function __construct()
    {
        $this->configs["LOG_LEVEL"] = getenv("LOG_LEVEL", "INFO");
        $path = getenv("LOG_PATH", "/logs/app.log");
        $this->configs["LOG_PATH"] = $this->joinPaths('..', $path);
    }

    public function get($name) {
        return $this->configs[$name] ?? null;
    }


    /* Private. */

    private array $configs;

    private function joinPaths() {
        $paths = array();
        foreach (func_get_args() as $arg)
            if ($arg !== '') $paths[] = $arg;
        
        return preg_replace('#/+#', '/', join('/', $paths));
    }

}

?>