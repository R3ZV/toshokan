<?php

require_once("config/router.php");
require_once("config/pdo.php");

$uri = $_SERVER["REQUEST_URI"];
$router = new Router($uri);
echo $router->resolve();

?>
