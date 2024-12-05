<?php
require_once("src/views/template.php");

function displayBook($book): string {
    $table = '<table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Description</th>
                <th>Genre</th>
                <th>Stock</th>
                <th>Published</th>
            </tr>
        </thead>
        <tbody>';

    if ($book) {
        $table .= '<tr>
            <td>' . htmlspecialchars($book['id']) . '</td>
            <td>' . htmlspecialchars($book['title']) . '</td>
            <td>' . htmlspecialchars($book['author']) . '</td>
            <td>' . htmlspecialchars($book['description']) . '</td>
            <td>' . htmlspecialchars($book['genre']) . '</td>
            <td>' . htmlspecialchars($book['stock']) . '</td>
            <td>' . htmlspecialchars($book['published']) . '</td>
        </tr>';
    }

    $table .= '</tbody></table>';

    return htmlFromTemplate($table);
}
?>
