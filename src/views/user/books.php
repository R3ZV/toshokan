<?php
require_once("src/views/template.php");
require_once("src/views/book/book_card.php");

function showBooks($books): string {
    $content = "<ul>";

    foreach ($books as $book) {
        $item = sprintf(
            '<li><a href="user/return?id=%s">%s</a></li>',
            2, "Jaws");

        $content .= $item;
    }

    $content .= '</ul>';
    return htmlFromTemplate($content);
}
?>

