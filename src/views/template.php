<?php
function htmlFromTemplate(string $inject): string {
    $format = sprintf('
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="color-scheme" content="light dark">
            <title>Toshokan</title>
            <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
        </head>
        <body>
            <nav class="container">
                <ul>
                    <li><strong>Toshokan</strong></li>
                </ul>
                <ul>
                    <li><a href="/" class="contrast">Home</a></li>
                    <li><a href="/book/index" class="contrast">Books</a></li>
                    <li><a href="/login" class="contrast">Log In</a></li>
                </ul>
            </nav>

            <main class="container">
            %s
            </main>
        </body>
        </html>
        ', $inject);

    return $format;
}
?>
