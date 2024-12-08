<?php
require_once "config/pdo.php";

// TODO:
// remove the suffix Book since it is obvious what they will get
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

    public static function deleteBook($id): bool {
        global $pdo;

        $sql = "DELETE FROM books WHERE id = :id;";
        $stmt = $pdo->prepare($sql);
        $status = $stmt->execute(array(":id" => $id));
        return $status;
    }

    public static function editBook(array $data): bool {
        global $pdo;

        $sql = "UPDATE books SET 
                    title = :title, 
                    author = :author, 
                    description = :description, 
                    genre = :genre, 
                    stock = :stock, 
                    published = :published 
                WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $status = $stmt->execute(
            array(
                ":title" => $data['title'],
                ":author" => $data['author'],
                ":description" => $data['description'],
                ":genre" => $data['genre'],
                ":stock" => $data['stock'],
                ":published" => $data['published'],
                ":id" => $data['id'],
            )
        );
        return $status;
    }
}
?>

