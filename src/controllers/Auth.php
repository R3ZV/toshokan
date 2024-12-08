<?php

require_once('src/models/User.php');

class Auth {
    public static function logout() {
        unset($_SESSION['logged']);

        header("Location: /");
        die();
    }

    public static function loginGet(): string {
        if ($_SESSION['logged'] === true) {
            header("Location: /");
            die();
        }

        require_once("src/views/auth/login.php");
        return loginPage();
    }

    public static function loginPost($data): bool {
        return User::exists($data['username'], $data['password']);
    }

    public static function login(): string {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return self::loginGet();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'username' => $_POST['username'],
                'password' => $_POST['password'],
            ];

            // TODO:
            // hash the password
            if (self::loginPost($data)) {
                $_SESSION['logged'] = true;
            } else {
                header("Location: /login");
                die();
            }
        } else {
            header("Location: /404");
            die();
        }

        header("Location: /");
        die();
    }
}

?>
