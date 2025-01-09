<?php

$url = "https://openlibrary.org/search?subject=Science+fiction&page=1";
$html = file_get_contents($url);

$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTML($html);
libxml_clear_errors();

$xpath = new DOMXPath($dom);

$spanClass = "bookauthor";
$authors_qry = "//span[contains(concat(' ', normalize-space(@class), ' '), ' $spanClass ')]";
$authors = $xpath->query($authors_qry);

foreach ($authors as $author) {
    echo "Author: " . $author->nodeValue . "\n";
}
?>
