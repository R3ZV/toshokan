<?php
require_once "config/pdo.php";

class User {
    // TODO: change it so you check email instead of username
    public static function exists(string $email, string $password): bool {
        global $pdo;

        $sql = "
            SELECT * FROM users
            WHERE email = :email AND
                  password = :password;
        ";

        $stmt = $pdo->prepare($sql);
        $status = $stmt->execute(array(":email" => $email, ":password" => $password));

        return $status;
    }

    public static function emailUsed(string $email): bool {
        global $pdo;

        $sql = "
            SELECT * FROM users
            WHERE email = :email;
        ";

        $stmt = $pdo->prepare($sql);
        $status = $stmt->execute(array(":email" => $email));

        return $status;
    }
}
?>
