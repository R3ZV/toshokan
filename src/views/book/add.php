<?php
require_once("src/views/template.php");

function addBook(): string {
    $form = '<form action="/book/add" method="POST">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="" required>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" id="author" name="author" value="" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="" required>
        </div>
        <div class="form-group">
            <label for="genre">Genre</label>
            <input type="text" class="form-control" id="genre" name="genre" value="" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="" required>
        </div>
        <div class="form-group">
            <label for="published">Published</label>
            <input type="number" class="form-control" id="published" name="published" value="" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Book</button>
    </form>';

    return htmlFromTemplate($form);
}

?>

