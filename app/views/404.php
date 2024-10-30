<?php
require_once("template.php");

function notFoundPage(): string {
    $content = '
        <div class="container">
            <h1>404</h1>
            <a href="/">Home</a>
        </div>
    ';
    return htmlFromTemplate($content);
}

?>
