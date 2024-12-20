<?php

require_once('src/models/User.php');

class Auth {
    static function hashWithSalt(string $pass): string {
        $salt = "thisissomeserioussaltasifyouwouldntknowit";
        return hash('sha256', $salt . $pass);
    }

    public static function account() {
        require_once('src/views/auth/account.php');

        // TODO: fetch data from db
        $userInfo = [];
        $userInfo['username'] = "test username";
        $userInfo['role'] = "test role";
        $userInfo['libraryPass'] = "test status";
        $userInfo['email'] = "test email";
        $userInfo['borrowed'] = ['book1', 'book2', 'book3'];
        return accountInfo($userInfo);
    }

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
        // TODO:
        // 1. Check if the user exists
        // 2. Get his role or id in session
        return User::exists($data['email'], $data['password']);
    }

    public static function login(): string {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return self::loginGet();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'email' => $_POST['email'],
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

    public static function signupGet(): string {
        if ($_SESSION['logged'] === true) {
            header("Location: /");
            die();
        }

        require_once("src/views/auth/signup.php");
        return signUpPage();
    }

    public static function signupPost($data): bool {
        // TODO:
        // 1. Check if the email has been used before
        // TODO:
        /* return User::exists($data['username'], $data['password']); */
        return true;
    }

    public static function signup(): string {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return self::signupGet();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
            ];

            $data['password'] = self::hashWithSalt($data['password']);

            self::signupPost($data);
            header("Location: /login");
            die();
        } else {
            header("Location: /404");
            die();
        }

        header("Location: /");
        die();
    }
}

?>
