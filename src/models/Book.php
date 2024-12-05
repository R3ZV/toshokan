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

    public static function getBook($id): array {
        global $pdo;

        $sql = "SELECT * FROM books WHERE id = :id;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(":id" => $id));

        $book = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($book == NULL) {
            return [];
        }

        return $book;
    }
}
?>

