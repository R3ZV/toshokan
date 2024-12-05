<?php
require_once("template.php");

function home(): string {
    $content = '
        <div class="container">
            <h1>Hello you are at the homepage.</h1>
            <h1>You can see our books at: <a href="book/index">Books</a></h1>
        </div>
    ';

    return htmlFromTemplate($content);
}

?>
