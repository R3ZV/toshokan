<?php
require_once "config/pdo.php";

class Books {
    public static function getAllBooks() {
        global $pdo;

        $sql = "
        SELECT * FROM books;
        ";

        $stmt = $pdo->query($sql);
        $stmt = $pdo->prepare($sql);
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $books;
    }
}
?>

