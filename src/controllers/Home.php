<?php

class HomeController {
    static function index(): string {
        require_once("src/views/home.php");
        return home();
    }
}

?>
