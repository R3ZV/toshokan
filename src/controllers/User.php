<?php

require_once('src/models/User.php');

class UserController {
    public static function activate(): string {
        if ($_SESSION['logged'] !== true || $_SESSION['user_role'] !== 'member') {
            header("Location: /404");
            die();
        }

        if (!User::canRequest($_SESSION['user_id'])) {
            header("Location: /");
            die();
        }

        if (User::activateRequest($_SESSION['user_id'])) {
            header("Location: /account");
        } else {
            header("Location: /home");
        }
        die();
    }

    public static function booksGet(): string {
        return "TODO";
    }

    public static function booksPost(): string {
        return "TODO";
    }

    public static function returnBook(): string {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return self::booksGet();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return self::booksPost();
        } else {
            header("Location: /404");
            die();
        }

        header("Location: /");
        die();
    }
}
?>
