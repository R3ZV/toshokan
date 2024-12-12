<?php
require_once("template.php");

function home($books): string {
    $content = '<div class="container-fluid">';
    for ($i = 0; $i < min(10, sizeof($books)); $i++) {
        $book = sprintf('
            <article>
                <header>
                    <p>%s - %s</p>
                </header>
                    <p>Description: %s</p>
                    <p>Genre: %s</p>
                    <p>Stock: %s</p>
                <footer>
                    <a href="book/view?id=%s">View</a>
                </footer>
            </article>
            ', htmlspecialchars($books[$i]['title']),
               htmlspecialchars($books[$i]['author']),
               htmlspecialchars($books[$i]['description']),
               htmlspecialchars($books[$i]['genre']),
               htmlspecialchars($books[$i]['stock']),
               htmlspecialchars($books[$i]['id']));

        $content .= $book;
    }

    $content .= '</div>';
    $content .= '<a href="/book/index">See all books</a>';

    return htmlFromTemplate($content);
}
?>
