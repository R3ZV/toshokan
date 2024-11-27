<?php

require_once "app/models/Book.php";

class BookController {
    public static function index() {
        require_once "app/views/book/index.php";

        $books = Book::getAllBooks();
        return displayBooks($books);
    }

    public static function show() {
        // TODO:

        /* $user_id = $_GET['id']; */
        /* $user = User::getUser($user_id); */
        /**/
        /* if ($user) { */
        /*     require_once "app/views/users/show.php"; */
        /* } else { */
        /*     $_SESSION['error'] = "User not found"; */
        /*     require_once "app/views/404.php"; */
        /* } */
    }
}
?>
