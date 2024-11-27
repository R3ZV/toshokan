<?php
require_once("template.php");

function displayBooks(books) {
    books = Books::getAllBooks();
    $content = '<div class="container">' . $books . '</div>';
    return $content;
}

?>
