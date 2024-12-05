<?php
require_once("template.php");

function notFoundPage(): string {
    $content = '
        <div class="container">
            <div class="container">
                <img src="public/404.gif" alt="404 Error">
            </div>
            <p>- Big Smoke</p>
        </div>
    ';
    return htmlFromTemplate($content);
}

?>
