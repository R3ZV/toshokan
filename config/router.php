<?php

class Router {
    protected $routes = [];

    public function addRoute(string $route, callable $action) {
        $this->routes[$route] = $action;
    }

    public function direct(): string {
        $uri = strtok($_SERVER['REQUEST_URI'], '?');

        if (array_key_exists($uri, $this->routes)) {
            $action = $this->routes[$uri];
            return $action();
        } else {
            header("Location: /404");
            die();
        }
    }
}

?>
