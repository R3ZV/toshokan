<?php
require_once "config/pdo.php";

class Activation {
    public static function getAll() {
        global $pdo;

        $sql = "SELECT id FROM activations;";

        $stmt = $pdo->query($sql);
        $activations = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $activations;
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

    static function deleteReq($id) {
        global $pdo;

        $sql = "
            DELETE FROM activations WHERE id = :id;
        ";

        $stmt = $pdo->prepare($sql);
        $status = $stmt->execute(array(":id" => $id));
    }

    public static function approveReq($id) {
        // TODO:
        global $pdo;

        $sql = "
        ";

        $stmt = $pdo->prepare($sql);
        $status = $stmt->execute(array(":id" => $id));

        return $status;
    }

    public static function denyReq($id) {
        // TODO:
        global $pdo;

        $sql = "
        ";

        $stmt = $pdo->prepare($sql);
        $status = $stmt->execute(array(":id" => $id));

        return $status;
    }
}
?>
