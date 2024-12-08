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

    static function editGet($id): string {
        $book = Book::getBook($id);

        require_once "src/views/book/edit.php";
        return editBook($book);
    }

    static function editPost(array $data): bool {
        return Book::editBook($data);
    }

    public static function edit(): string {
        if (!array_key_exists('id', $_GET)) {
            header("Location: /404");
            die();
        }

        $id = $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return self::editGet($id);
        }

        // TODO: use result from editPost() to check for fail
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id' => $id,
                'title' => $_POST['title'],
                'author' => $_POST['author'],
                'description' => $_POST['description'],
                'genre' => $_POST['genre'],
                'stock' => $_POST['stock'],
                'published' => $_POST['published']
            ];

            if ($data['stock'] < 0) {
                header("Location: /book/index");
                die();
            }

            if ($data['published'] < 0) {
                header("Location: /book/index");
                die();
            }

            self::editPost($data);
        } else {
            header("Location: /404");
            die();
        }

        header("Location: /book/index");
        die();
    }

    public static function addGet(): string {
        require_once "src/views/book/add.php";
        return addBook();
    }

    public static function addPost($data): bool {
        return Book::addBook($data);
    }

    public static function add(): string {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return self::addGet();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'title' => $_POST['title'],
                'author' => $_POST['author'],
                'description' => $_POST['description'],
                'genre' => $_POST['genre'],
                'stock' => $_POST['stock'],
                'published' => $_POST['published']
            ];

            // TODO:
            // use sessions to save data on fail
            if ($data['stock'] < 0) {
                header("Location: /book/add");
                die();
            }

            if ($data['published'] < 0) {
                header("Location: /book/add");
                die();
            }

            self::addPost($data);
        } else {
            header("Location: /404");
            die();
        }

        header("Location: /book/index");
        die();
    }
}
?>
