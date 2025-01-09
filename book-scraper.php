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

$h3Class = "booktitle";
$titles_qry = "//h3[contains(concat(' ', normalize-space(@class), ' '), ' $h3Class ')]";
$titles = $xpath->query($titles_qry);

$span2Class = "resultDetails";
$year_qry = "//span[contains(concat(' ', normalize-space(@class), ' '), ' $span2Class ')]";
$years = $xpath->query($year_qry);

for ($i = 0; $i < count($years); $i++) {
    $sql = sprintf('INSERT INTO books (title, author, description, genre, stock, published)
        VALUES ("%s", "%s", "No description.", "Science Fiction", 0, %s);',
        trim($titles[$i]->nodeValue),
        substr(trim($authors[$i]->nodeValue), 3),
        substr(trim($years[$i]->nodeValue), 19, 4)
    );

    echo $sql . "\n";
}
?>
