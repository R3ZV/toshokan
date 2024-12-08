<?php
require_once("src/views/template.php");

function displayBooks($books): string {
    $table = '<table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Genre</th>
                <th scope="col">Stock</th>
                <th scope="col">Published</th>
    ';
    if ($_SESSION['logged']) {
        $table .= '<th scope="col col">Modify</th>';
    }
    $table .= '</tr></thead><tbody>';

    foreach ($books as $book) {
        $table .= '<tr>
            <th scope="row">' . htmlspecialchars($book['id']) . '</th>
            <td>' . htmlspecialchars($book['title']) . '</td>
            <td>' . htmlspecialchars($book['author']) . '</td>
            <td>' . htmlspecialchars($book['genre']) . '</td>
            <td>' . htmlspecialchars($book['stock']) . '</td>
            <td>' . htmlspecialchars($book['published']) . '</td>
            ';

        if ($_SESSION['logged']) {
            $table .= '<td>
                <a href="/book/edit?id=' . htmlspecialchars($book['id']) . '">Edit</a> |
                <a href="/book/delete?id=' . htmlspecialchars($book['id']) . '">Delete</a>
            </td>';
        }

        $table .= '</tr>';
    }

    $table .= '</tbody></table>';
    if ($_SESSION['logged']) {
        $table .= '<a href="/book/add">Add a book</a>';
    }

    return htmlFromTemplate($table);
}
?>
