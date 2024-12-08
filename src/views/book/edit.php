<?php
require_once("src/views/template.php");

function editBook($book): string {
    $form = '<form action="/book/edit?id=' . htmlspecialchars($book['id']) . '" method="POST">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="' . htmlspecialchars($book['title']) . '" required>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" id="author" name="author" value="' . htmlspecialchars($book['author']) . '" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="' . htmlspecialchars($book['description']) . '" required>
        </div>
        <div class="form-group">
            <label for="genre">Genre</label>
            <input type="text" class="form-control" id="genre" name="genre" value="' . htmlspecialchars($book['genre']) . '" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="' . htmlspecialchars($book['stock']) . '" required>
        </div>
        <div class="form-group">
            <label for="published">Published</label>
            <input type="number" class="form-control" id="published" name="published" value="' . htmlspecialchars($book['published']) . '" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Book</button>
    </form>';

    return htmlFromTemplate($form);
}

?>
