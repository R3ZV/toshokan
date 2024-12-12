<?php
require_once("src/views/template.php");

function accountInfo(): string {
    $content = '
    <article>
        <header>
            <p>Hello "username"</p>
        </header>
            <p>License status: active / pending / inactive</p>
            <p>Email: email@account.com</p>
            <p>Books borrowed: </p>
            <p>Book1</p>
        <footer>
            <a href="user/return">Return book</a>
        </footer>
    </article>
    <a href="/logout">Log out</a>
    ';
    return htmlFromTemplate($content);
}

?>
