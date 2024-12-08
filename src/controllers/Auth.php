<?php

class Auth {
    public static function login(): string {
        /* TODO: */
        /* if logged_in redirect to homepage; */
        require_once("src/views/auth/login.php");
        return loginPage();
    }
}

?>
