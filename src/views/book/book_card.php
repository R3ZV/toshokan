<?php

function bookCard($book, $view): string {
    $adminInfo = '';
    if ($_SESSION['logged'] && $_SESSION['user_role'] === 'admin') {
        $adminInfo .= '
            <a href="/book/edit?id=' . htmlspecialchars($book['id']) . '">Edit</a>
            <a href="/book/delete?id=' . htmlspecialchars($book['id']) . '">Delete</a>
            ';
    }

    $bookRef = '';
    if ($_SESSION['logged'] && $_SESSION['user_role'] === 'member') {
        $bookRef = sprintf('<footer><a href="book/borrow?id=%s">Borrow</a></footer>',
            htmlspecialchars($book['id']));
    }

    $bookView = '';
    if ($view) {
        $bookView = sprintf('<a href="/book/view?id=%s">View</a>', htmlspecialchars($book['id']));
    }

    $book = sprintf('
        <article>
            <header>
                <p>%s - %s</p>
            </header>
            <div>
                <p>Description: %s</p>
                <p>Genre: %s</p>
                <p>Stock: %s</p>
            </div>
            <footer>
                %s
                %s
                %s
            </footer>
        </article>
        ',
        htmlspecialchars($book['title']),
        htmlspecialchars($book['author']),
        htmlspecialchars($book['description']),
        htmlspecialchars($book['genre']),
        htmlspecialchars($book['stock']),
        $bookView,
        $adminInfo,
        $bookRef
    );

    return $book;
}

?>
