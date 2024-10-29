<?php
require_once "config/pdo.php"; 

class User {
    public static function getAllUsers() {
        global $pdo;

        $sql = "
            SELECT * FROM users;
        ";

        $stmt = $pdo->query($sql);
        // $stmt = $pdo->prepare($sql);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo users;
    }
}

User::getAllUsers();

?>
