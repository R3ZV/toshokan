<?php

require_once('src/models/User.php');

class Auth {
    static function hashWithSalt(string $pass): string {
        $salt = "thisissomeserioussaltasifyouwouldntknowit";
        return hash('sha256', $salt . $pass);
    }

    public static function account() {
        require_once('src/views/auth/account.php');

        if (!array_key_exists('user_id', $_SESSION)) {
            header("Location: /");
            die();
        }

        $userInfo = User::getUserInfo($_SESSION['user_id']);

        $userInfo['borrowed'] = ['todo', 'todo', 'todo'];
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
        $res = User::exists($data['email'], $data['password']);
        if ($res !== NULL) {
            $user_data = User::getUserInfo($res['id']);
            $_SESSION['user_id'] = $user_data['id'];
            $_SESSION['user_role'] = $user_data['role'];
            return true;
        }
        return false;
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

            $data['password'] = self::hashWithSalt($data['password']);

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
        if (User::usedEmail($data['email'])) {
            $_SESSION['err'] = "used-email";
            return false;
        }
        return User::addUser($data);
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

            if (self::signupPost($data)) {
                header("Location: /login");
            } else {
                header("Location: /signup");
            }
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
