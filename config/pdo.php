<?php
$env = parse_ini_file('.env');

$DB_USER = $env["DB_USER"];
$DB_PASS = $env["DB_PASS"];

$pdo = new PDO(
    "mysql:host=localhost;port=3306;dbname=biblioteca",
    $DB_USER,
    $DB_PASS
    "admin",
    "jsonderulo"
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
