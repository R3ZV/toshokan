<?php
require_once("./config/router.php");

// Views
require_once("./app/views/404.php");
require_once("./app/views/home.php");

$router = new Router();

$router->addRoute("/users", function () {
    echo "<h1>TODO</h1>";
});

$router->addRoute("/", function () {
    echo homePage();
});

$router->addRoute("/404", function () {
    echo notFoundPage();
});

$uri = $_SERVER["REQUEST_URI"];
$router->resolve($uri);
?>
