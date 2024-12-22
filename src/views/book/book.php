<?php
require_once("src/views/template.php");
require_once("src/views/book/book_card.php");

function displayBook($book): string {
    return htmlFromTemplate(bookCard($book, false));
}
?>

