<?php
require_once("src/views/template.php");

function displayBook($book): string {
    $book = sprintf('
        <article>
            <header>
                <p>%s - %s</p>
            </header>
                <p>Description: %s</p>
                <p>Genre: %s</p>
                <p>Stock: %s</p>
            <footer>
                <a href="book/borrow?id=%s">Borrow</a>
            </footer>
        </article>
        ', htmlspecialchars($book['title']),
           htmlspecialchars($book['author']),
           htmlspecialchars($book['description']),
           htmlspecialchars($book['genre']),
           htmlspecialchars($book['stock']),
           htmlspecialchars($book['id']));

    return htmlFromTemplate($book);
}
?>
