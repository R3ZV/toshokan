<?php

require_once("./app/views/404.php");

$routes = [
    "books" => ["BookController", "index"],
];

class Router {
    private $uri;

    public function __construct() {
        $this->uri = trim($_SERVER["REQUEST_URI"], "/");
    }

    public function resolve() {
        global $routes;

        echo $this->uri;
        if (array_key_exists($this->uri, $routes)) {
            [$controller, $method] = $routes[$this->uri];
            $path = "app/controllers/{$controller}.php";

            echo $path;

            require_once($path);



            return $controller::$method();
        }

        return notFoundPage();
    }
}


/* class Router { */
/*     public function resolve(string $path) { */
/*         if (array_key_exists($path, $this->routes)) { */
/*             $this->routes[$path](); */
/*         } else { */
/*             header("Location: /404"); */
/*             die(); */
/**/
/*         } */
/*     } */
/* } */
?>
