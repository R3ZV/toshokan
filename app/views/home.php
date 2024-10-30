<?php
require_once("template.php");

function homePage(): string {
    $content = '
        <div class="container">
            <h1>Welcome to our library!</h1>
            <p>Here is a list of our newest books</p>
            <ul>
                <li>TODO: this will come from db</li>
            </ul>
        </div>
    ';
    return htmlFromTemplate($content);
}

?>
