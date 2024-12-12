<?php
require_once("config/router.php");

// Controllers
require_once("src/controllers/Home.php");
require_once("src/controllers/Book.php");
require_once("src/controllers/Errors.php");
require_once("src/controllers/Auth.php");

$router = new Router();

// Misc
$router->addRoute("/", [HomeController::class, "index"]);
$router->addRoute("/login", [Auth::class, "login"]);
$router->addRoute("/account", [Auth::class, "account"]);
$router->addRoute("/logout", [Auth::class, "logout"]);
$router->addRoute("/404", [Errors::class, "notFound"]);

// Books
$router->addRoute("/book/index", [BookController::class, "index"]);
$router->addRoute("/book/view", [BookController::class, "view"]);
$router->addRoute("/book/edit", [BookController::class, "edit"]);
$router->addRoute("/book/delete", [BookController::class, "delete"]);
$router->addRoute("/book/add", [BookController::class, "add"]);

session_start();
if ($_SESSION == NULL) {
    $_SESSION['logged'] = false;
}

echo $router->direct();

?>
