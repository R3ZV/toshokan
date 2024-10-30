<?php
function htmlFromTemplate(string $inject): string {
    $format = sprintf('
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="color-scheme" content="light dark">
            <link rel="stylesheet" href="css/pico.min.css">
            <title>Biblioteca</title>
        </head>
        <body>
            <main class="container">
            %s
            </main>
        </body>
        </html>
        ', $inject);
    return $format;
}
?>
