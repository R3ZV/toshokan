<?php
require_once "config/pdo.php";

class User {
    public static function exists($username, $password): bool {
        global $pdo;

        var_dump($username, $password);

        $sql = "
            SELECT * FROM users
            WHERE username = :username AND
                  password = :password AND
                  role = 'admin';
        ";
        $stmt = $pdo->prepare($sql);
        $status = $stmt->execute(array(":username" => $username, ":password" => $password));

        return $status;
    }
}
?>
