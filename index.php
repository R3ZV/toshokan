<?php

require_once("./config/router.php");

$router = new Router();
$uri = $_SERVER["REQUEST_URI"];
$router->resolve($uri);

?>
