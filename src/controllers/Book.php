<?php

require_once "src/models/Book.php";

class BookController {
    public static function index() {
        require_once "src/views/book/index.php";

        $books = Book::getAllBooks();
        return displayBooks($books);
    }

    public static function show() {

        if (!array_key_exists('id', $_GET)) {
            header("Location: /404");
            die();
        }

        $id = $_GET['id'];
        $book = Book::getBook($id);

        require_once "src/views/book/book.php";
        return displayBook($book);
    }

    public static function edit() {
        if (!array_key_exists('id', $_GET)) {
            header("Location: /404");
            die();
        }

        $id = $_GET['id'];
        $book = Book::getBook($id);

        require_once "src/views/book/edit.php";
        return editBook($book);
    }
}
?>
