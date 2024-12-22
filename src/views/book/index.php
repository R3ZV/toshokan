<?php
require_once("src/views/template.php");
require_once("src/views/book/book_card.php");

function displayBooks($books): string {
    $content = '';
    if ($_SESSION['logged'] && $_SESSION['user_role'] === 'admin') {
        $content .= '<a href="/book/add">Add a book</a>';
    }

    $content .= '<div class="container-fluid">';

    foreach ($books as $book) {
        $content .= bookCard($book, true);
    }

    $content .= '</div>';
    return htmlFromTemplate($content);
}
?>
