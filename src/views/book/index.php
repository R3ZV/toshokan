<?php
require_once("src/views/template.php");

function displayBooks($books): string {
    $content = '';
    if ($_SESSION['logged']) {
        $content .= '<a href="/book/add">Add a book</a>';
    }

    $content .= '<div class="container-fluid">';


    foreach ($books as $book) {
        $adminInfo = '';
        if ($_SESSION['logged']) {
            $adminInfo .= '
                <a href="/book/edit?id=' . htmlspecialchars($book['id']) . '">Edit</a>
                <a href="/book/delete?id=' . htmlspecialchars($book['id']) . '">Delete</a>
            ';
        }

        $book = sprintf('
            <article>
                <header>
                    <p>%s - %s</p>
                </header>
                    <p>Description: %s</p>
                    <p>Genre: %s</p>
                    <p>Stock: %s</p>
                <footer>
                    <a href="/book/view?id=%s">View</a>
                    %s
                </footer>
            </article>
            ',
            htmlspecialchars($book['title']),
            htmlspecialchars($book['author']),
            htmlspecialchars($book['description']),
            htmlspecialchars($book['genre']),
            htmlspecialchars($book['stock']),
            htmlspecialchars($book['id']),
            $adminInfo
        );

        $content .= $book;
    }

    $content .= '</div>';
    return htmlFromTemplate($content);
}
?>
