<?php
require_once("config/router.php");

// Controllers
require_once("src/controllers/Home.php");
require_once("src/controllers/Book.php");
require_once("src/controllers/Errors.php");

$router = new Router();
$router->addRoute("/", [HomeController::class, "index"]);
$router->addRoute("/404", [Errors::class, "notFound"]);

$router->addRoute("/book/index", [BookController::class, "index"]);
$router->addRoute("/book/show", [BookController::class, "show"]);
$router->addRoute("/book/edit", [BookController::class, "edit"]);

echo $router->direct();

?>
