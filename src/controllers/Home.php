<?php

class HomeController {
    static function index(): string {
        require_once("src/views/home.php");

        $books = Book::getAllBooks();
        return home($books);
    }
}

?>
