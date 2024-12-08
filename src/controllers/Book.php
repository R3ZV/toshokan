<?php

require_once "src/models/Book.php";

class BookController {
    public static function index(): string {
        require_once "src/views/book/index.php";

        $books = Book::getAllBooks();
        return displayBooks($books);
    }

    public static function show(): string {
        if (!array_key_exists('id', $_GET)) {
            header("Location: /404");
            die();
        }

        $id = $_GET['id'];
        $book = Book::getBook($id);

        require_once "src/views/book/book.php";
        return displayBook($book);
    }

    public static function delete() {
        if (!array_key_exists('id', $_GET)) {
            header("Location: /404");
            die();
        }

        $id = $_GET['id'];
        Book::deleteBook($id);

        header("Location: /book/index");
        die();
    }

    function editGet(): string {
    }

    function editPost(): string {
    }
    public static function edit(): string {
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
