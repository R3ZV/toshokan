<?php

class Router {
    private array $routes;
    function __constructor() {
        $this->routes = array();
    }

    public function addRoute(string $path, closure $handler) {
        $this->routes[$path] = $handler;
    }

    public function resolve(string $path) {
        if (array_key_exists($path, $this->routes)) {
            $this->routes[$path]();
        } else {
            header("Location: /404");
            die();

        }
    }
}

?>
