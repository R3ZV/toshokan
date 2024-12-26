<?php
function htmlFromTemplate(string $inject): string {
    $logged = false;

    if (array_key_exists('logged', $_SESSION)) {
        $logged = $_SESSION['logged'];
    }

    $authLink = $logged ?
    '<li><a href="/account" class="contrast">Account</a></li>' : 
    '<li><a href="/login" class="contrast">LogIn</a></li>';

    $format = sprintf('
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="color-scheme" content="light dark">
            <title>Toshokan</title>
            <link rel="icon" type="image/x-icon" href="favicon.ico">
            <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
        </head>
        <body>
            <nav class="container">
                <ul>
                    <img src="/public/logo.svg" alt="Project Icon" style="height: 30px; width: 30px; margin-right: 8px;">
                    <li><strong>Toshokan</strong></li>
                </ul>
                <ul>
                    <li><a href="/" class="contrast">Home</a></li>
                    <li><a href="/book/index" class="contrast">Books</a></li>
                    %s
                </ul>
            </nav>

            <main class="container">
            %s
            </main>
        </body>
        </html>
        ', $authLink, $inject);

    return $format;
}
?>
