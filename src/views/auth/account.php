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
                %s
                <p>Email: %s</p>
            <footer>
                %s
            </footer>
        </article>
        <a href="/logout">Log out</a>
        ',
        $userInfo['username'],
        $userInfo['role'],
        $userInfo['pass_status'] === 0 ? 'Inactive' : 'Active',
        ($userInfo['pass_status'] === 0 && $userInfo['role'] !== 'admin') ? '<a href="user/activatepass">Activate</a>' : '',
        $userInfo['email'],
        ($userInfo['role'] === 'admin') ? '<a href="admin/activations">Activation requests</a>' : '<a href="user/return">Return books</a>'
    );

    return htmlFromTemplate($content);
}

?>
