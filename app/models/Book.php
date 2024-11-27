<?php
require_once "config/pdo.php";

class Book {
    public static function getAllBooks() {
        global $pdo;

        $sql = "SELECT * FROM books;";

        $stmt = $pdo->query($sql);
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $books;
    }
}
?>

