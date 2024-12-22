<?php
require_once("src/views/template.php");

function listBooks($books): string {
    $list = '<ul>';

    foreach ($books as $book) {
        $list .= '<li>' . $book . '</li>';
    }

    $list .= "</ul";
    return $list;
}

function accountInfo($userInfo): string {
    $content = sprintf('
        <article>
            <header>
                <p>%s</p>
            </header>
                <p>Role: [%s]</p>
                <p>Pass status: %s</p>
                <p>Email: %s</p>
                <div>
                    <p>Books borrowed: </p>
                    %s
                </div>
            <footer>
                <a href="user/return">Return books</a>
            </footer>
        </article>
        <a href="/logout">Log out</a>
        ',
        $userInfo['username'],
        $userInfo['role'],
        $userInfo['pass_status'] === 0 ? 'Inactive' : 'Active',
        $userInfo['email'],
        listBooks($userInfo['borrowed'])
    );

    return htmlFromTemplate($content);
}

?>
