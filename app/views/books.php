<?php
require_once("template.php");
require_once("../models/Books.php");

function allBooks(): string {
    books = Books::getAllBooks();
    $content = '
        <div class="container"> 
        </div>
    ';
    return htmlFromTemplate($content);
}

?>
