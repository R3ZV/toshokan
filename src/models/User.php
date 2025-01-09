<?php
require_once "config/pdo.php";

class User {
    public static function exists(string $email, string $password) {
        global $pdo;

        $sql = "
            SELECT id FROM users
            WHERE email = :email AND
            password = :password;
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(":email" => $email, ":password" => $password));

        $id = $stmt->fetch(PDO::FETCH_ASSOC);

        return $id;
    }

    public static function usedEmail(string $email): bool {
        global $pdo;

        $sql = "
            SELECT * FROM users
            WHERE email = :email;
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(":email" => $email));

        if ($stmt->rowCount() > 0) {
            return true;
        }

        return false;
    }
    public static function canRequest($id) {
        global $pdo;

        $sql = "
            SELECT * FROM activations
            WHERE id_user = :id;
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(":id" => $id));

        if ($stmt->rowCount() > 0) {
            return false;
        }

        return true;
    }

    public static function activateRequest($id) {
        global $pdo;

        $sql = "
            INSERT INTO activations (id_user)
            VALUES (:id);
        ";

        $stmt = $pdo->prepare($sql);
        $status = $stmt->execute(array(":id" => $id));

        return $status;
    }

    public static function addUser($data): bool {
        global $pdo;

        $sql = "
            INSERT INTO users (username, email, password, role, pass_status)
            VALUES (:username, :email, :password, 'member', 0);
        ";

        $stmt = $pdo->prepare($sql);
        $status = $stmt->execute(array(
            ":username" => $data['username'],
            ":email" => $data['email'],
            ":password" => $data['password']
        ));

        return $status;
    }

    public static function getUserInfo($id) {
        global $pdo;

        // TODO: get borrowed books
        $sql = "
            SELECT * FROM users
            WHERE id = :id;
        ";

        $stmt = $pdo->prepare($sql);
        $ok = $stmt->execute(array(":id" => $id));
        if ($ok) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        }

        return NULL;
    }
}
?>
